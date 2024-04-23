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
      Schema::create('order_items', function (Blueprint $table) {
        $table->uuid('order_item_id')->primary();
        $table->foreignUuid('order_id')->references('order_id')->on('orders');
        $table->foreignUuid('product_id')->references('product_id')->on('products');        
        $table->integer('sub_total');
        $table->integer('quantity');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
