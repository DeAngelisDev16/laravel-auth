<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->slug = Str::slug($newProject->title);
            $newProject->title = $faker->sentence(4);
            $newProject->description = $faker->text(200);
            $newProject->github_reference = $faker->text(200);
            $newProject->save();
        }
    }
}
