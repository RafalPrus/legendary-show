<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->words(3, true),
            'excerpt' => fake()->sentence(),
            'description' => fake()->paragraphs(6, true),
            'type_id' => fake()->randomElement([1, 2]),
            'category_id' => Category::factory(),
            'release_year' => fake()->numberBetween(1920, 2023),
            'author_id' => Author::factory(),
            'user_id' => User::factory()
        ];
    }
}


//$table->id();
//$table->string('name');
//$table->text('excerpt');
//$table->text('description');
//$table->string('category');
//$table->integer('release_year');
//$table->foreignId('author_id')->constrained();
//$table->timestamps();
