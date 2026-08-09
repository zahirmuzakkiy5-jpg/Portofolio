<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $projects = Project::latest()->take(3)->get();
    $skills = Skill::all();
    $profile = Profile::first();
    $contactInfo = ContactInfo::first();
    return view('welcome', compact('projects', 'skills', 'profile', 'contactInfo'));
});

Route::get('/all-projects', function () {
    $projects = Project::latest()->get();
    return view('projects.index', compact('projects'));
});

Route::get('/projects/{id}', function ($id) {
    $project = Project::findOrFail($id);
    return view('projects.show', compact('project'));
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Laravel Breeze)
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

/*
|--------------------------------------------------------------------------
| Admin Routes (Projects, Skills, Profile Settings, & Contact Info)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', AdminProjectController::class);
    Route::resource('skills', SkillController::class);

    Route::get('profile-settings', [ProfileAdminController::class, 'edit'])->name('profile.edit');
    Route::put('profile-settings', [ProfileAdminController::class, 'update'])->name('profile.update');

    Route::get('contact-info', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info', [ContactInfoController::class, 'update'])->name('contact-info.update');
});

require __DIR__.'/auth.php';