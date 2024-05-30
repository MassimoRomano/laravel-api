<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(5, true);
            $project->slug = Str::of($project->title)->slug('-');
            $project->project =$faker->url();
            $project->description = $faker->text(500);
            $project->image = $faker->imageUrl(600, 300, 'Post', true, $project->title, 'jpg');
            $project->save();
        }
    }
}
