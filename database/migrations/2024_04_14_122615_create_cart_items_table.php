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
      Schema::create('cart_items', function (Blueprint $table) {
        $table->uuid('cart_item_id')->primary();
        // $table->id('cart_item_id');
        $table->foreignUuid('cart_id')->references('cart_id')->on('carts');
        $table->foreignUuid('product_id')->references('product_id')->on('products');
        $table->integer('quantity');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('cart_items');
    }
};
