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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index(); 
            $table->unsignedBigInteger('product_id')->index(); 
            $table->string('product_name');
            $table->integer('quantity');
            $table->double('price', 8, 2);
            $table->double('discount', 8, 2);
            $table->double('tax', 8, 2);
            $table->double('total', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
