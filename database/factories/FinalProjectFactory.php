<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\Course;
use App\Models\FinalProject;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinalProject>
 */
class FinalProjectFactory extends Factory
{
    protected $model = FinalProject::class;

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
            'curso_id' => Course::inRandomOrder()->first()->id,
            'titulo' => fake()->sentence(),
            'palavras_chave' => fake()->word(),
            'data_publicacao' => fake()->date(),
        ];
    }
}
