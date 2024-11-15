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
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('seller_type_id')->constrained('seller_types')->onDelete('cascade')->after('car_transmission_id');
            $table->string('body_style')->after('seller_type_id')->after('seller_type_id');
            $table->string('exterior_color')->after('body_style')->after('body_style');
            $table->string('interior_color')->after('exterior_color')->after('exterior_color');
            $table->string('engine')->after('interior_color')->after('interior_color');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('seller_type_id');
            $table->dropColumn('body_style');
            $table->dropColumn('exterior_color');
            $table->dropColumn('interior_color');
            $table->dropColumn('engine');

        });
    }
};
