<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Picture;
use App\Models\Section;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'picture_name' => $this->faker->word . '.jpg', // Example filename
            'description' => $this->faker->sentence,

            'section_id' => Section::factory()->create()->id,
            'activity_id' => Activity::factory()->create()->id,
            'event_id' => Event::factory()->create()->id,
        ];
    }
}
