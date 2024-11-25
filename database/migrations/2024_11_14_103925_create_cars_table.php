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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_category_id')->constrained('car_categories')->onDelete('cascade');
            $table->foreignId('car_transmission_id')->constrained('car_transmissions')->onDelete('cascade');
            $table->string('full_name');
            $table->string('contact_number');
            $table->string('vin_number');
            $table->string('year');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('mileage');
            $table->string('equipment');
            $table->boolean('is_modified');
            $table->text('modification_details')->nullable();
            $table->boolean('is_any_mechanical_cosmetic_flaws');
            $table->text('mechanical_cosmetic_flaws_details')->nullable();
            $table->string('location');
            $table->boolean('is_sales_elsewhere');
            $table->string('title_location');
            $table->string('state');
            $table->boolean('is_title_in_name');
            $table->string('title_status');
            $table->boolean('is_set_min_price');
            $table->string('price_unit');
            $table->string('bit_price');
            $table->string('thumbnail')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

