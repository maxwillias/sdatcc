<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\Article;
use App\Models\Course;
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
            'autor_id' => Student::inRandomOrder()->first()->id,
            'orientador_id' => Advisor::inRandomOrder()->first()->id,
            'curso_id' => Course::inRandomOrder()->first()->id,
            'titulo' => fake()->sentence(),
            'palavras_chave' => fake()->word(),
            'publicado_em' => fake()->word(),
            'data_publicacao' => fake()->date(),
        ];
    }
}
