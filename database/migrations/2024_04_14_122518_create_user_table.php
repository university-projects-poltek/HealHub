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
    Schema::create('users', function (Blueprint $table) {
      // $table->id('user_id');
      $table->uuid('user_id')->primary();
      $table->string('username');
      $table->string('email')->unique();
      $table->string('password');
      $table->string('address');
      $table->integer('phone');
      $table->enum('role', ['buyer', 'seller']);
      $table->string('updated_at');
      $table->string('created_at');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
    {
      Schema::dropIfExists('users');
    }
};
