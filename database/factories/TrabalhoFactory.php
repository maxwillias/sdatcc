<?php

namespace Database\Factories;

use App\Models\Trabalho;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabalho>
 */
class TrabalhoFactory extends Factory
{
    protected $model = Trabalho::class;

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
