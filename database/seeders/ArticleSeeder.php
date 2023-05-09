<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

use Ybazli\Faker\Faker as myFaker;
use Faker\Factory as Faker; ### in the head off class
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $myfaker = new Faker();
        $faker = Faker::create();
        $faker_fa = new myFaker();


        for ($i = 0; $i < 15; $i++) {
            Article::create([
                "user_id" => 1,
                "category_id" => rand(1, 4),


                'title_fa' => $faker_fa->sentence(),
                'text_fa' => $faker_fa->paragraph(2),
                'title_en' => $faker->text(10),
                'text_en' => $faker->paragraph(),

            ]);
        }
    }
}
