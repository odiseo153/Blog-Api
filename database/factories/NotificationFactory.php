<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\notifications>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Relación con User
            'type' => $this->faker->randomElement(['comment_reply', 'new_post', 'flagged_comment']),
            'data' => $this->faker->sentence,
            'read_at' => $this->faker->dateTime,
        ];
    }
}
