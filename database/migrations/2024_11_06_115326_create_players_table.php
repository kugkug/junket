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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('player_code')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->bigInteger('nationality_id')->constrained('nationalities');
            $table->string('arrival_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('deposit');
            $table->string('checkout')->nullable();
            $table->bigInteger('status');
            $table->bigInteger('availment_id')->constrained('food_beverages')->nullable();
            $table->string('checked_in_by')->nullable();
            $table->string('checked_out_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};