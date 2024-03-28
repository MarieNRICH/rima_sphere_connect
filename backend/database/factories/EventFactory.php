<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => $this->faker->sentence,
            'event_date' => $this->faker->date,
            'place_address' => $this->faker->address,
            'start_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'end_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0, 1]), // Assuming status is a boolean field
            'duration' => $this->faker->numberBetween(1, 10), // Adjust the range as needed
            'volunteer' => 0,
            'participant' => 0,
        ];
    }
}
