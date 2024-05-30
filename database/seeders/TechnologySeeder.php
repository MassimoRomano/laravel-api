<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['html','css','php','js','ai'];

        foreach($technologies as $technology){
            $newTec = new Technology();
            $newTec->name = $technology;
            $newTec->slug = Str::slug($newTec->name, '-');
            $newTec->save();
        }
    }
}
