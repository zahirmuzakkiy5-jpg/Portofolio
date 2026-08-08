<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
protected $fillable = ['name', 'description', 'obtained_at', 'certificate'];
}
