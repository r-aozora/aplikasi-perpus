<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'    => User::where('role', 'pembaca')->inRandomOrder()->first()->id,
            'buku_id'    => Buku::inRandomOrder()->first()->id,
            'ulasan'     => $this->faker->paragraph,
            'rating'     => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'created_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
