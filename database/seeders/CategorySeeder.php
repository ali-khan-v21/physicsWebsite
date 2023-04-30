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

            "category_key"=>'article_analyzation',
            "name_fa"=>'تحلیل مقالات',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'article analyzation',
            "desc_en"=>'english description',
        ]);
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

            "category_key"=>'parapsychology',
            "name_fa"=>'فراراوانشناسی',
            "desc_fa"=>'فراروانشناسی|تجربیات نزدیک به مرگ و تجربه خروج از بدن ',
            "name_en"=>'parapsychology',
            "desc_en"=>'NDE & OBE',
        ]);
        Category::create([

            "category_key"=>'resarchlabs',
            "name_fa"=>'مراکز تحقیقاتی',
            "desc_fa"=>'آشنایی با مراکر تحقیقاتی',
            "name_en"=>'research labs',
            "desc_en"=>'NDE & OBE',
        ]);
        Category::create([

            "category_key"=>'seminars',
            "name_fa"=>'گردهمایی ها',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'seminars',
            "desc_en"=>'english description',
        ]);
        Category::create([

            "category_key"=>'association_meetings',
            "name_fa"=>'جلسات انجمن',
            "desc_fa"=>' توضیحات فارسی',
            "name_en"=>'association meeting',
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
