<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'primary_color',
        'background_color',
        'background_image_url',
        'promo_text',
        'promo_active',
        'admin_password',
    ];
}