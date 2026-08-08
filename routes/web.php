<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $projects = Project::latest()->take(3)->get();
    return view('welcome', compact('projects'));
});

Route::get('/all-projects', function () {
    $projects = Project::latest()->get();
    return view('projects.index', compact('projects'));
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Laravel Breeze & Admin)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Project Routes (Resource)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', AdminProjectController::class);
});

require __DIR__.'/auth.php';