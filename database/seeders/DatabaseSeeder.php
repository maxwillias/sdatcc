<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Root',
            'email' => 'root@sdatcc.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            FinalProjectSeeder::class,
            ArticleSeeder::class,
            AdvisorSeeder::class,
            StudentSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
