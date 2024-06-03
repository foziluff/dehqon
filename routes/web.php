<?php

use App\Http\Controllers\Admin\AgroCredit\AgroCreditController;
use App\Http\Controllers\Admin\AgroMarket\AgroMarketController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\SendCodeController;
use App\Http\Controllers\Admin\Auth\Users\UsersController;
use App\Http\Controllers\Admin\Auth\VerifyCodeController;
use App\Http\Controllers\Admin\Auth2\AuthController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionCategoryController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionConsumptionController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionNamingController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionOperationController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionProductionMeanController;
use App\Http\Controllers\Admin\Conversion\Consumption\ConversionTypeController;
use App\Http\Controllers\Admin\Conversion\ConversionController;
use App\Http\Controllers\Admin\Conversion\Income\ConversionIncomeController;
use App\Http\Controllers\Admin\Conversion\Quantity\ConversionQuantityController;
use App\Http\Controllers\Admin\Culture\CultureController;
use App\Http\Controllers\Admin\Culture\CultureSeasonController;
use App\Http\Controllers\Admin\Culture\CultureSeasonImageController;
use App\Http\Controllers\Admin\Culture\CultureSeasonWorkController;
use App\Http\Controllers\Admin\Field\Consumption\ConsumptionCategoryController;
use App\Http\Controllers\Admin\Field\Consumption\ConsumptionController;
use App\Http\Controllers\Admin\Field\Consumption\ConsumptionNamingController;
use App\Http\Controllers\Admin\Field\Consumption\ConsumptionOperationController;
use App\Http\Controllers\Admin\Field\Consumption\ConsumptionProductionMeanController;
use App\Http\Controllers\Admin\Field\FieldController;
use App\Http\Controllers\Admin\Field\Income\IncomeController;
use App\Http\Controllers\Admin\Field\Note\NoteController;
use App\Http\Controllers\Admin\Field\Note\NoteImageController;
use App\Http\Controllers\Admin\Field\Note\ProblemController;
use App\Http\Controllers\Admin\Field\ProductQuantity\ProductQuantityController;
use App\Http\Controllers\Admin\Field\ProductTypeController;
use App\Http\Controllers\Admin\Field\RotationController;
use App\Http\Controllers\Admin\Field\Work\WorkController;
use App\Http\Controllers\Admin\Field\Work\WorkPlanController;
use App\Http\Controllers\Admin\Field\Work\WorkStageController;
use App\Http\Controllers\Admin\Irrigation\IrrigationController;
use App\Http\Controllers\Admin\Irrigation\IrrigationTypeController;
use App\Http\Controllers\Admin\Irrigation\IrrigationTypeImageController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\News\NewsImageController;
use App\Http\Controllers\Admin\Question\QuestionController;
use App\Http\Controllers\Admin\Stock\StockController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login')
    ->middleware('throttle:3,2');


Route::get('/send-code', [LoginController::class, 'sendCodeView'])->name('reset');
Route::get('/verify-code', [LoginController::class, 'verifyView'])->name('verify');

Route::post('/send-code', [SendCodeController::class, 'sendCode'])->name('sendCode')
    ->middleware('throttle:1,1');
Route::post('/verify-code', [VerifyCodeController::class, 'verifyCode'])->name('verifyCode')->middleware('throttle:3,3');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.main');
    })->name('main');

    Route::resource('/users', UsersController::class)->names('users');
    Route::get('/users/{id}/fields', [FieldController::class, 'filterByUser'])->name('users.fields');
    Route::get('/users/{id}/conversions', [ConversionController::class, 'filterByUser'])->name('users.conversions');
    Route::get('/users/{id}/stocks', [StockController::class, 'filterByUser'])->name('users.stocks');

    Route::resource('/fields', FieldController::class)->names('fields');
    Route::get('/fields/{id}/notes', [NoteController::class, 'filterByField'])->name('fields.notes');
    Route::get('/fields/{id}/rotations', [RotationController::class, 'filterByField'])->name('fields.rotations');
    Route::get('/fields/{id}/product-quantities', [ProductQuantityController::class, 'filterByField'])->name('fields.productQuantities');
    Route::get('/fields/{id}/incomes', [IncomeController::class, 'filterByField'])->name('fields.incomes');
    Route::get('/fields/{id}/consumptions', [ConsumptionController::class, 'filterByField'])->name('fields.consumptions');
    Route::get('/fields/{id}/work-plans', [WorkPlanController::class, 'filterByField'])->name('fields.workPlans');

    Route::get('/work-plans/{id}/work-stages', [WorkStageController::class, 'filterByWorkPlan'])->name('workPlans.workStages');

    Route::get('/conversions/{id}/incomes', [ConversionIncomeController::class, 'filterByConversion'])->name('conversions.incomes');
    Route::get('/conversions/{id}/consumptions', [ConversionConsumptionController::class, 'filterByConversion'])->name('conversions.consumptions');
    Route::get('/conversions/{id}/quantities', [ConversionQuantityController::class, 'filterByConversion'])->name('conversions.quantities');


    Route::resource('/cultures', CultureController::class)->names('cultures');
    Route::get('/cultures/{id}/seasons', [CultureSeasonController::class, 'filterByCulture'])->name('cultures.cultureSeasons');
    Route::resource('/culture-seasons', CultureSeasonController::class)->names('cultureSeasons');
    Route::delete('/culture-season-images/{id}', [CultureSeasonImageController::class, 'destroy'])->name('cultureSeasonImages.destroy');
    Route::resource('/culture-season-works', CultureSeasonWorkController::class)->names('cultureSeasonWorks');
    Route::get('/culture-seasons/{id}/works', [CultureSeasonWorkController::class, 'filterByCultureSeason'])->name('cultureSeasons.works');

    Route::resource('/problems', ProblemController::class)->names('problems');
    Route::resource('/notes', NoteController::class)->names('notes');
    Route::delete('/notes-images/{id}', [NoteImageController::class, 'destroy'])->name('noteImages.destroy');

    Route::resource('/rotations', RotationController::class)->names('rotations');
    Route::resource('/work-plans', WorkPlanController::class)->names('workPlans');
    Route::resource('/work-stages', WorkStageController::class)->names('workStages');
    Route::resource('/works', WorkController::class)->names('works');

    Route::resource('/incomes', IncomeController::class)->names('incomes');
    Route::resource('/consumptions', ConsumptionController::class)->names('consumptions');
    Route::resource('/consumption-categories', ConsumptionCategoryController::class)->names('consumptionCategories');
    Route::resource('/consumption-namings', ConsumptionNamingController::class)->names('consumptionNamings');
    Route::resource('/consumption-operations', ConsumptionOperationController::class)->names('consumptionOperations');
    Route::resource('/consumption-production-means', ConsumptionProductionMeanController::class)->names('consumptionProductionMeans');
    Route::resource('/product-types', ProductTypeController::class)->names('productTypes');

    Route::resource('/product-quantities', ProductQuantityController::class)->names('productQuantities');
    Route::resource('/stocks', StockController::class)->names('stocks');
    Route::resource('/conversions', ConversionController::class)->names('conversions');

    Route::resource('/conversion-consumptions', ConversionConsumptionController::class)->names('conversionConsumptions');
    Route::resource('/conversion-categories', ConversionCategoryController::class)->names('conversionCategories');
    Route::resource('/conversion-namings', ConversionNamingController::class)->names('conversionNamings');
    Route::resource('/conversion-operations', ConversionOperationController::class)->names('conversionOperations');
    Route::resource('/conversion-production-means', ConversionProductionMeanController::class)->names('conversionProductionMeans');
    Route::resource('/conversion-types', ConversionTypeController::class)->names('conversionTypes');

    Route::resource('/conversion-incomes', ConversionIncomeController::class)->names('conversionIncomes');
    Route::resource('/conversion-quantities', ConversionQuantityController::class)->names('conversionQuantities');

    Route::resource('/news', NewsController::class)->names('news');
    Route::delete('/news-images/{id}', [NewsImageController::class, 'destroy'])->name('newsImages.destroy');

    Route::resource('/questions', QuestionController::class)->names('questions');

    Route::resource('/irrigations', IrrigationController::class)->names('irrigations');
    Route::resource('/irrigation-types', IrrigationTypeController::class)->names('irrigationTypes');
    Route::delete('/irrigation-type-images/{id}', [IrrigationTypeImageController::class, 'destroy'])->name('irrigationTypeImages.destroy');
    Route::get('/irrigations/{id}/types', [IrrigationTypeController::class, 'filterByIrrigation'])->name('irrigations.irrigationTypes');

    Route::resource('/agro-markets', AgroMarketController::class)->names('agroMarkets');
    Route::resource('/agro-credits', AgroCreditController::class)->names('agroCredits');

});
