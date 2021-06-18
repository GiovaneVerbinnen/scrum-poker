<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\SessionPage;

use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');

Route::get('session', SessionPage::class)->name('session');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
