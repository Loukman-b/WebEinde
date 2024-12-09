<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MalfunctionsController;


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

Route::get('/malfunction', [MalfunctionsController::class, 'index'])->name('malfunction.index');
Route::post('/malfunction', [MalfunctionsController::class, 'store'])->name('malfunction.store');
Route::get('/malfunction/create', [MalfunctionsController::class, 'create'])->name('malfunction.create');
Route::get('/malfunction/{malfunction}', [MalfunctionsController::class, 'show'])->name('malfunction.show');
Route::get('/malfunction/{malfunction}/edit', [MalfunctionsController::class, 'edit'])->name('malfunction.edit');
Route::put('/malfunction/{malfunction}', [MalfunctionsController::class, 'update'])->name('malfunction.update');
Route::delete('/malfunction/{malfunction}', [MalfunctionsController::class, 'destroy'])->name('malfunction.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
