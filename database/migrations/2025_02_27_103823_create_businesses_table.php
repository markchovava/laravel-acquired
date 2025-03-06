<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('province_id')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->string('email')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
