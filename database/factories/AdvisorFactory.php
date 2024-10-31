<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advisor>
 */
class AdvisorFactory extends Factory
{
    protected $model = Advisor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'curso_id' => Course::inRandomOrder()->first()->id,
        ];
    }
}
