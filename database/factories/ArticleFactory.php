<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\Article;
use App\Models\Student;
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
            'aluno_id' => Student::inRandomOrder()->first()->id,
            'orientador_id' => Advisor::inRandomOrder()->first()->id,
            'titulo' => fake()->sentence(),
            'data_publicacao' => fake()->date(),
        ];
    }
}
