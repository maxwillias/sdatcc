<?php

namespace Database\Seeders;

use App\Models\Trabalho;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrabalhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trabalho::factory(50)->create();
    }
}
