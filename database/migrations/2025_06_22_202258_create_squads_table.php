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
        Schema::create('squads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('coach_id')->nullable();
            $table->timestamps();

            $table->foreign('coach_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('squads');
    }
};
