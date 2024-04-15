<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->word,
      'description' => $this->faker->sentence,
      'price' => $this->faker->numberBetween(1000, 10000), // Harga antara 1000 dan 10000
      'quantity' => $this->faker->numberBetween(1, 100), // Jumlah antara 1 dan 100
      'manufacturer' => $this->faker->company,
      'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Tanggal dibuat dalam satu tahun terakhir
      'updated_at' => now(),
      'category_id' => mt_rand(1, 2)
    ];
  }
}
