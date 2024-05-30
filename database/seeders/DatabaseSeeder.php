<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\TypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
            TypeSeeder::class,
            TechnologySeeder::class
        ]);
    }
}
