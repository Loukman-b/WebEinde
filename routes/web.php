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

Route::get('/',
[MalfunctionsController::class, 'index'])
->name('malfunctions.index');


Route::get('/malfunction', [MalfunctionsController::class, 'index'])->name('malfunctions.index');
// de middelware functie zorgt ervoor dat de pagina alleen toegankelijk is voor ingelogde gebruikers
Route::post('/malfunction', [MalfunctionsController::class, 'store'])->middleware('auth')->name('malfunctions.store'); 
Route::get('/malfunction/create', [MalfunctionsController::class, 'create'])->middleware('auth')->name('malfunctions.create');
Route::get('/malfunction/{malfunction}/edit', [MalfunctionsController::class, 'edit'])->name('malfunctions.edit');
Route::put('/malfunction/{malfunction}', [MalfunctionsController::class, 'update'])->name('malfunctions.update');
Route::delete('/malfunction/{malfunction}', [MalfunctionsController::class, 'destroy'])->name('malfunctions.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
