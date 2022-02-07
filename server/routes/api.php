<?php

use App\Http\Controllers\LandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('buildings', [BuildingController::class, 'index']);
Route::get('buildings/{id}', [BuildingController::class, 'detail']);
Route::post('buildings', [BuildingController::class, 'create']);
Route::post('buildings/{id}', [BuildingController::class, 'edit']);
Route::delete('buildings/{id}', [BuildingController::class, 'delete']);
