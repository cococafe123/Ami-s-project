<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ViewController;
use App\Http\Controllers\CardController;

Route::get('/', [ViewController::class, 'showHome'])->name('home');
Route::resource('card', CardController::class)->only(['store', 'destroy']);

Route::get('/id?={id}', [ViewController::class, 'showDetail'])->name('detail');

Route::get('/manage', [ViewController::class, 'showManage'])->name('manage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
