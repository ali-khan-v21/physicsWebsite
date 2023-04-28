<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([

            "category_key"=>'cognitive_neuroscience',
            "name_fa"=>'علوم و اعصاب شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive neuroscience',
            "desc_en"=>'english description',
        ]);
        Category::create([

            "category_key"=>'neurophilosophy',
            "name_fa"=>'فلسفه ذهن',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'neurophilosophy',
            "desc_en"=>'english description',
        ]);
        Category::create([

            "category_key"=>'begginer_tutorials',
            "name_fa"=>'آموزش مقدماتی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'begginer tutorials',
            "desc_en"=>'english description',
        ]);
        Category::create([

            "category_key"=>'news',
            "name_fa"=>'اخبار',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'news',
            "desc_en"=>'english description',
        ]);

    }
}
