<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'author' => $faker->firstName.' '.$faker->lastName,
                'published_at' => $faker->date('Y-m-d', 'now'),
                'expired_at' => $faker->dateTimeInInterval('+30days'),
                'created_at' => $faker->date('Y-m-d', 'now'),
            ]);
        }
    }
}
