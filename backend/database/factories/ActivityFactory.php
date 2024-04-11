<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Le modèle associé au factory.
     *
     * @var string
     */

    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $difficultyLevels = ['débutant', 'intermédiaire', 'avancé'];

        return [
            'activity_name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'start_at' => fake()->dateTime(),
            'end_at' => fake()->dateTime(),
            'duration' => fake()->numberBetween(1, 24), // time in hour
            'place_address' => fake()->address(),
            'challengers_number' => fake()->numberBetween(1, 100),
            'difficulty' => Arr::random($difficultyLevels),
        ];
    }
}
