<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Conversion\ConversionController;
use App\Http\Controllers\Admin\Culture\CultureController;
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
use App\Http\Controllers\Admin\Stock\StockController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login')
    ->middleware('throttle:3,2');


Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.main');
    })->name('main');
    Route::resource('/cultures', CultureController::class)->names('cultures');
    Route::resource('/fields', FieldController::class)->names('fields');
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

});
