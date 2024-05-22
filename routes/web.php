<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CultureController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\NoteImageController;
use App\Http\Controllers\Admin\ProblemController;
use App\Http\Controllers\Admin\RotationController;
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
});
