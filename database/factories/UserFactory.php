<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $name = $this->faker->unique->name,
            'slug'     => Str::slug($name),
            'email'    => $this->faker->unique->safeEmail,
            'username' => $this->faker->unique->userName,
            'password' => Hash::make('password'),
            'telepon'  => $this->faker->phoneNumber,
            'alamat'   => $this->faker->address,
            'role'     => 'pembaca',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
