<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition()
    {
        // Generation of data common to all types of users
        $userData = [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'pseudo' => fake()->userName,
            'phone_number' => fake()->phoneNumber,
            'date_of_birth' => fake()->date,
            'address' => fake()->address,
            'zip_code' => fake()->postcode,
            'gender' => fake()->randomElement(['male', 'female']),
            'avatar' => null,
            'emergency_phone_contact' => fake()->phoneNumber,
            'password' => bcrypt('password'),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
        return $userData;
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
