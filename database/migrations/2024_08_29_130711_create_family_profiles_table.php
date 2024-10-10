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
        Schema::create('family_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('sex');
            $table->string('age');
            $table->string('birthdate');
            $table->string('civilstatus');
            $table->string('religion');
            $table->string('educAttainment');
            $table->string('occupation');
            $table->string('tenurestatus');
            $table->string('typeOfDwelling');
            $table->string('watersource');
            $table->string('toiletFacility');
            $table->string('housing_materials');
            $table->string('4ps');
            $table->boolean('is_approved')->default(false); // default zero
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_profiles');
    }
};
