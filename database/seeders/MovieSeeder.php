<?php
// database/seeders/MovieSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $genres = Genre::all();

        foreach (range(1, 50) as $index) {
            Movie::create([
                'title' => $faker->sentence,
                'poster' => $faker->imageUrl(),
                'intro' => $faker->paragraph,
                'release_date' => $faker->date,
                'genre_id' => $genres->random()->id,
            ]);
        }
    }
}
