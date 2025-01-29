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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('discount_type', ['flat', 'percentage'])->default('percentage');
            $table->string('discount_name')->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->unsignedInteger('validity')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->enum('active', ['Yes', 'No'])->default('Yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
