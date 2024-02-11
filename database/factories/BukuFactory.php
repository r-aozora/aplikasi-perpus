<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = $this->faker->unique->words(3, true);
        $judul = ucwords($judul);

        return [
            'judul'        => $judul,
            'slug'         => Str::slug($judul),
            'penulis'      => $this->faker->name,
            'penerbit'     => $this->faker->company,
            'tahun_terbit' => $this->faker->year,
            'deskripsi'    => $this->faker->paragraph,
            'stok'         => $this->faker->randomNumber,
            'kategori_id'  => Kategori::inRandomOrder()->first()->id,
        ];
    }
}
