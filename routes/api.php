<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PenyewaanApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/penyewaan-komponen-solvethink', [PenyewaanApiController::class, 'index']);
Route::get('/penyewaan-komponen-solvethink/{id}', [PenyewaanApiController::class, 'show']);
Route::put('/penyewaan-komponen-solvethink/{id}', [PenyewaanApiController::class, 'update']);
Route::delete('/penyewaan-komponen-solvethink/{id}', [PenyewaanApiController::class, 'destroy']);