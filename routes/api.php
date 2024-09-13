<?php

use App\Http\Controllers\Api\AgroCredit\AgroCreditController;
use App\Http\Controllers\Api\AgroMarket\AgroMarketController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\SendCodeController;
use App\Http\Controllers\Api\Auth\VerifyCodeController;
use App\Http\Controllers\Api\Culture\CultureController;
use App\Http\Controllers\Api\Field\Consumption\ConsumptionController;
use App\Http\Controllers\Api\Field\FieldController;
use App\Http\Controllers\Api\Field\Income\IncomeController;
use App\Http\Controllers\Api\Field\Note\NoteController;
use App\Http\Controllers\Api\Field\Rotation\RotationController;
use App\Http\Controllers\Api\Field\WorkPlan\WorkController;
use App\Http\Controllers\Api\Field\WorkPlan\WorkPlanController;
use App\Http\Controllers\Api\Field\WorkPlan\WorkStageController;
use App\Http\Controllers\Api\FuelType\FuelTypeController;
use App\Http\Controllers\Api\Irrigation\IrrigationController;
use App\Http\Controllers\Api\Organization\OrganizationController;
use App\Http\Controllers\Api\Problem\ProblemController;
use Illuminate\Support\Facades\Route;

Route::get('/check-user/{phone}', [SendCodeController::class, 'check']);
Route::post('/send-code', [SendCodeController::class, 'sendCode']);
//    ->middleware('throttle:1,1');
Route::post('/verify-code', [VerifyCodeController::class, 'verifyCode'])->middleware('throttle:3,1');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:3,1');

Route::middleware('auth:sanctum')->group(function (){

    Route::get('/user', [LoginController::class, 'getUser']);

    Route::get('/cultures', [CultureController::class, 'index']);
    Route::get('/fuel-types', [FuelTypeController::class, 'index']);
    Route::get('/agro-markets', [AgroMarketController::class, 'index']);
    Route::get('/agro-credits', [AgroCreditController::class, 'index']);
    Route::get('/organizations', [OrganizationController::class, 'index']);
    Route::get('/irrigations', [IrrigationController::class, 'index']);
    Route::get('/problems', [ProblemController::class, 'index']);


    Route::resource('/fields', FieldController::class);

    Route::get('/fields/{id}/notes', [NoteController::class, 'filterByField']);
    Route::get('/notes/status/{status}', [NoteController::class, 'getByStatus']);
    Route::resource('/notes', NoteController::class);
    Route::delete('/notes-images/{id}', [NoteController::class, 'destroyImage']);

    Route::get('/fields/{id}/consumptions', [ConsumptionController::class, 'filterByField']);
    Route::resource('/consumptions', ConsumptionController::class);

    Route::get('/fields/{id}/incomes', [IncomeController::class, 'filterByField']);
    Route::resource('/incomes', IncomeController::class);

    Route::get('/fields/{id}/work-plans', [WorkPlanController::class, 'filterByField']);
    Route::resource('/work-plans', WorkPlanController::class);

    Route::get('/works', [WorkController::class, 'index']);
    Route::get('/fields/{id}/rotations', [RotationController::class, 'filterByField']);
    Route::resource('/rotations', RotationController::class);

    Route::get('/work-plans/{id}/work-stages', [WorkStageController::class, 'filterByPlan']);
    Route::resource('/work-stages', WorkStageController::class);
});

