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
        Schema::create('brgy_inhabitants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('age');
            $table->string('birthdate');
            $table->string('placeofbirth');
            $table->string('sex');
            $table->string('civilstatus');
            $table->string('positioninFamily');
            $table->string('citizenship');
            $table->string('educAttainment');
            $table->string('occupation');
            $table->string('ofw');
            $table->string('pwd');
            $table->timestamps();
            $table->boolean('is_approved')->default(false); // default zero

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_inhabitants');
    }
};
