<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = ['Action', 'Martial Arts', 'Comedy', 'Drama', 'Horror'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
