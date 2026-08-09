<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Tambahkan baris ini di dalam class
    protected $fillable = ['title', 'description', 'email','is_featured'];
}