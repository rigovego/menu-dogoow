<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'primary_color' => '#C94A3F',
            'background_color' => '#F5E9DA',
            'background_image_url' => null,
            'promo_text' => '¡Llévate tu combo favorito en dogoow!',
            'promo_active' => true,
            'admin_password' => Hash::make('1234'),
        ]);
    }
}