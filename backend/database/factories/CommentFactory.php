<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comment;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph,
            'image' => fake()->imageUrl(),
            'tags' => fake()->words(3, true),

            'activity_id' => Activity::factory(),
            'user_id' => User::factory(),

        ];
    }
}
