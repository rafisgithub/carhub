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
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('banner')->nullable();

            $table->timestamps();
        });
        DB::table('c_m_s')->insert([
            // cars-and-bids

            //  about us
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 1 id = 1 for about us section
            // ceo message
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 2 id = 2 for ceo message section



            // How It Works
            // Buying a car
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 3 id = 3 for 
            // Selling a car
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 4 id = 4 for
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 5 id = 5 for
            // frontend banner
            ['title' => null, 'created_at' => now(), 'updated_at' => now()], // row = 6 id = 6 for
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_m_s');
    }
};
