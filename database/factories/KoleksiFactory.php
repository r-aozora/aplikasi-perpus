<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Koleksi>
 */
class KoleksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'pembaca')->inRandomOrder()->first()->id,
            'buku_id' => Buku::inRandomOrder()->first()->id,
        ];
    }
}
