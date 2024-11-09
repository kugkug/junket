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
        Schema::create('player_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id')->constrained('players');
            $table->bigInteger('availment_id');
            $table->string('accomodation')->nullable();
            $table->string('room')->nullable();
            $table->string('resturant')->nullable();
            $table->longText('foods')->nullable();
            $table->string('receipt')->nullable();
            $table->string('total_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_transactions');
    }
};