<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[PageController::class,'index'])->name('index');

Route::post('login',[PageController::class,'login'])->name('login');

Route::get('dashboard',[PageController::class,'dashboard'])->name('dashboard');

Route::get('profile',[PageController::class,'indexProfil'])->name('profile');

Route::get('/logout', [PageController::class, 'logout'])->name('logout');