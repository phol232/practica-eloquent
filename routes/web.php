<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ContactanosController; 

Route::get('/', HomeController::class)->name('home'); 

Route::view('/', 'welcome')->name('welcome'); 

Route::resource('cursos', CursoController::class);
Route::view('nosotros', 'nosotros')->name('nosotros');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');