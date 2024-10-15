<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'autor' => fake()->name(),
            'orientador' => fake()->name(),
            'titulo' => fake()->sentence(),
            'data_publicacao' => fake()->date(),
            'resumo' => fake()->text(),
        ];
    }
}
