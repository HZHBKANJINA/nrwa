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
        Schema::create('country_languages', function (Blueprint $table) {
            $table->char('CountryCode', 3);
            $table->char('Language', 30);
            $table->enum('IsOfficial', ['T', 'F'])->default('F');
            $table->decimal('Percentage', 4, 1)->default(0.0);
            $table->primary(['CountryCode', 'Language']);
            $table->foreign('CountryCode')->references('Code')->on('countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_languages');
    }
};
