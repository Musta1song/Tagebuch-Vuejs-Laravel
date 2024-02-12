<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DiaryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('entry')->group(function () {
    Route::get('/',[ DiaryController::class, 'getAll']);
    Route::post('/',[ DiaryController::class, 'store']);
    Route::delete('/{id}',[ DiaryController::class, 'destroy']);
    Route::put('/{id}',[ DiaryController::class, 'update']);
});