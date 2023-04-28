<?php

namespace Database\Factories;

// use Ybazli\Faker\Faker as myFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Faker as myFaker;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        $faker_fa = new myFaker();


        return [


            "writer_id" => 1,
            "category_id" => rand(1, 4),


            'title_fa' => $faker_fa->sentence(),
            'text_fa' => $faker_fa->paragraph(2),
            'title_en' => $faker->text(10),
            'text_en' => $faker->paragraph(2),




        ];
    }
}
