<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

// 1. Halaman Utama (Ambil 3 project terbaru)
Route::get('/', function () {
    $projects = Project::latest()->take(3)->get();
    return view('welcome', compact('projects'));
});

// 2. Halaman Khusus Semua Project
Route::get('/all-projects', function () {
    $projects = Project::latest()->get();
    return view('projects.index', compact('projects'));
});