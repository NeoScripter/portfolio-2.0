<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Livewire\AboutMePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage as LivewireHomePage;
use App\Livewire\Portfolio;
use App\Livewire\Project;
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
Route::get('/portfolio', Portfolio::class)->name('portfolio');

Route::get('/project/{id}', Project::class)->name('project');

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('locale');

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
 */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/{project}', [ProjectController::class, 'edit'])->name('admin.project.edit');
    Route::post('/admin/project', [ProjectController::class, 'store'])->name('admin.project.store');
    Route::put('/admin/project/{project}', [ProjectController::class, 'update'])->name('admin.project.update');
    Route::delete('/admin/project/{project}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');

   /*  Route::get('/admin/projects/{search?}', [ProjectController::class, 'index'])
    ->where('search', '.*')
    ->name('admin.projects.index'); */

    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/{service}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/admin/service', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::put('/admin/service/{service}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('/admin/service/{service}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    /* Route::get('/admin/services/{search?}', [ServiceController::class, 'index'])
    ->where('search', '.*')
    ->name('admin.services.index'); */
});

require __DIR__ . '/auth.php';
