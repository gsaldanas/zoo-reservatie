<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/bezoekers-per-dag/{startDatum}/{eindDatum}', [App\Http\Controllers\ReservatieController::class, 'bezoekersPerDagGraph']);

Route::get('/reservatie', [App\Http\Controllers\ReservatieController::class, 'index'])->name('reservatie.index');
Route::post('/reservatie', [App\Http\Controllers\ReservatieController::class, 'store'])->name('reservatie.store');
