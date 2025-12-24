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
        Schema::create('permasalahans', function (Blueprint $table) {
            $table->id();
            $table->string('KB_implant');
            $table->string('Kehamilan');
            $table->string('Ibu_nifas');
            $table->string('Bayi_baru_lahir');
            $table->string('Reproduksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permasalahans');
    }
};