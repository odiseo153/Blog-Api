<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'publish_date' => $this->faker->dateTime,
            
            'user_id' => User::factory(),         // Relación con User
            'category_id' => Category::factory(), // Relación con Category
           
            'views_count' =>$this->faker->randomNumber(),
            'like_count' => $this->faker->randomNumber(),
        ];
    }


}
