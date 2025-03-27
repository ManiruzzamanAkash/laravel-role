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

    public static function assets(): array
    {
        $paths = [];

        if (file_exists('build/manifest.json')) {
            $files = json_decode(file_get_contents('build/manifest.json'), true);

            foreach ($files as $file) {
                $paths[] = $file['src'];
            }
        }

        return $paths;
    }
}
