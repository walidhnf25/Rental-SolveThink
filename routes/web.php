<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyewaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PenyewaanController::class, 'index'])->name('penyewaan.index');
Route::post('/pesanan', [PenyewaanController::class, 'store'])->name('penyewaan.store');