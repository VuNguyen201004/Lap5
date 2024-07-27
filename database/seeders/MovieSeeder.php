<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'poster' => $faker->imageUrl(200, 300, 'movie', true, 'Faker'),
                'intro' => $faker->text(100), // Giới hạn chiều dài cho trường intro
                'release_date' => $faker->date,
                'genre_id' => rand(1, 2), // Giả sử bạn có 2 thể loại
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
