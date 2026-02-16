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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('státusz', ['függőben', 'folyamatba', 'befejezett'])->default('függőben');
            $table->timestamps();
        });
        /*
        Hozz létre egy tasks táblát az alábbi oszlopokkal:
○ id (auto-increment, primary key)
○ title (VARCHAR, max 255 karakter) - A feladat megnevezése
○ description (TEXT, opcionális) - A feladat leírása
○ status (ENUM: pending, in_progress, completed) - a feladat állapota
○ created_at, updated_at (timestamp)
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
