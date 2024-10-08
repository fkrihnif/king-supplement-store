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
        Schema::create('product_supply', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_id')->nullable()->references('id')->on('supply')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->string('quantity');
            $table->string('price');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('user_id');
            $table->string('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_supply');
    }
};
