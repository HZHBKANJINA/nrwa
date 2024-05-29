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
        Schema::create('cities', function (Blueprint $table) {
            $table->id('ID');
            $table->char('Name', 35)->default('');
            $table->char('CountryCode', 3)->default('');
            $table->char('District', 20)->default('');
            $table->integer('Population')->default(0);
            $table->foreign('CountryCode')->references('Code')->on('countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
