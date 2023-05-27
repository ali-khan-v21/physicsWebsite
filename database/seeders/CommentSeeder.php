<?php
namespace Database\Seeders;
use App\Models\Comment;

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
      
        for ($i=0;$i<20;$i++){

            Comment::create([

                'name'=>$faker->word(),
                'email'=>$faker->email(),
                'body'=>$faker->sentence(1),
                'article_id'=>rand(1,5),
                'status'=>1,
                'writer_status'=>1
            ]);




        }
    }
}
