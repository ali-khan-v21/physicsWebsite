<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ArticleSeeder::class,
            CategorySeeder::class,
            WriterSeeder::class,
        ]);


        // \App\Models\Article::factory(10)->create();//persaon faker not working here

    }
}
