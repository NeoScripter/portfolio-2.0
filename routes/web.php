<?php

use App\Livewire\AboutMePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage as LivewireHomePage;
use App\Livewire\Services;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

Route::get('/', LivewireHomePage::class)->name('home');
Route::get('/about', AboutMePage::class)->name('about');
Route::get('/services', Services::class)->name('services');

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('locale');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
