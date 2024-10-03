<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_produk' => $this->faker->unique->numerify('M.####'),
            'nama_produk' => $this->faker->word(),
            'harga' => $this->faker->numberBetween(10000, 100000),
            'stok' => $this->faker->numberBetween(0, 100),
        ];
    }
}
