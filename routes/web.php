<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ViewController;
use App\Http\Controllers\HeartLinkController;
use App\Http\Controllers\ArchViewController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/', [ViewController::class, 'showHome'])->name('home');
Route::get('/Shop', [ViewController::class, 'showShop'])->name('shop');
Route::get('/Shop/{id}', [ViewController::class, 'showDetail'])->name('detail');
Route::get('/About', [ViewController::class, 'showAbout'])->name('about');
Route::get('/HeartLink/', [HeartLinkController::class, 'showHome'])->name('HeartLinkHome');

Route::get('/TEST/', [ViewController::class, 'showTest'])->name('test');

Route::get('/Arch/', [ArchViewController::class, 'showHome'])->name('ArchHome');
Route::get('/Arch/Blog', [ArchViewController::class, 'showBlog'])->name('ArchBlog');
