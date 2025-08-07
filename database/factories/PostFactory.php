<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    { 
        $title = fake()->sentence(rand(4, 6), false);
        return [
            'title'     => $title,
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug'      => Str::slug($title),
            'content'   => fake()->text(200)
        ];
    }
}
