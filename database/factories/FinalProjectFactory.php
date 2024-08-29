<?php

namespace Database\Factories;

use App\Models\FinalProject;
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
            'aluno' => fake()->name(),
            'orientador' => fake()->name(),
            'titulo' => fake()->sentence(),
            'data_publicacao' => fake()->date(),
            'resumo' => fake()->text(),
        ];
    }
}
