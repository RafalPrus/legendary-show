<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => Article::factory(),
            'user_id' => User::factory(),
            'body' => fake()->paragraphs(3, true),
        ];
    }
}
//$table->id();
//$table->foreignId('article_id')->constrained();
//$table->foreignId('user_id')->constrained();
//$table->text('body');
//$table->timestamps();
