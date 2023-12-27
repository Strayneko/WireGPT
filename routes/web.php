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
})->name('index')->middleware('auth');

Route::prefix('auth')->middleware('guest')->name('auth.')->group(function () {
    Route::get('login', \App\Livewire\Auth\Login\Index::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register\Index::class)->name('register');
});

