<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke users
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Relasi ke menus
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_menus');
    }
};
