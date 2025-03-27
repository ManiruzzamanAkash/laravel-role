<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'category',
        'tags',
        'priority',
        'icon',
        'version',
    ];

    protected $casts = [
        'status' => 'boolean',
        'tags' => 'array',
    ];
}
