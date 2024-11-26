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



        Schema::create('bidder_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable( );
            $table->string('phone_number')->nullable();
            $table->string('cvc')->nullable();
            $table->string('country_code')->nullable();
            $table->string('expiration')->nullable();
            $table->string('curency')->nullable();
            $table->string('bit_amount');
            $table->string('buyer_fee');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidder_registrations');
    }
};
