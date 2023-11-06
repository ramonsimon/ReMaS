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
    Route::get('/bon/{inname}', \App\Livewire\BonPrinten::class)->name('bon');
    Route::get('/verwerking', \App\Livewire\Verwerking::class)->name('verwerking');
    Route::get('/onderdelen', \App\Livewire\Onderdelen::class)->name('onderdelen');
    Route::get('/onderdelen/aanpassen/{id}', \App\Livewire\OnderdelenAanpassen::class)->name('onderdelenaanpassen');
    Route::get('onderdelen/toevoegen', \App\Livewire\OnderdeelToevoegen::class)->name('onderdeeltoevoegen');

});
