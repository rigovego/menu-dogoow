<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color')->default('#C94A3F');
            $table->string('background_color')->default('#F5E9DA');
            $table->text('background_image_url')->nullable();
            $table->string('promo_text')->nullable();
            $table->boolean('promo_active')->default(false);
            $table->string('admin_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
