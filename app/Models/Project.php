<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'live_url',
        'github_url',
        'is_featured',
        'image_url'
    ];
}
