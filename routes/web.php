<?php

use App\Livewire\Homepage;
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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', Homepage::class)->name('homepage');
    Route::get('/inname', \App\Livewire\Inname::class)->name('inname');
    Route::get('/bon', \App\Livewire\BonPrinten::class)->name('bon');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
