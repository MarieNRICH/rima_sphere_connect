<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section_name' => fake()->word,
            'number_of_member' => fake()->numberBetween(10, 100),
            'material' => fake()->word,
            'ffck_licence_number' => fake()->unique()->word,
            'member_ship_price' => fake()->randomFloat(2, 10, 100),
            'activity_contribution_rate' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
