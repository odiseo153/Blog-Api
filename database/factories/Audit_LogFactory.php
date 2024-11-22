<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\audit_logs>
 */
class Audit_LogFactory extends Factory
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
            'target_id' => Post::factory(), // Relación con User
            'target_type' =>'posts', // Relación con User
            'action' => $this->faker->randomElement(['post_created', 'comment_deleted', 'user_banned']),
            'description' => $this->faker->sentence,
            'created_at' => now(),
        ];
    }
}
