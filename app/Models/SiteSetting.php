<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'slider_images',
    ];

    // Cast slider_images to an array
    protected $casts = [
        'slider_images' => 'array',
    ];
}
