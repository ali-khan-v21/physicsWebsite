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
        $cat=Category::create([

            "category_key"=>'article_analyzation',
            "name_fa"=>'تحلیل مقالات',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'article analyzation',
            "desc_en"=>'english description',
            'navbar'=>true,
        ]);
        $cat->tags()->create([
            "tag_key"=>'cognitive_neuro_sciences_analysis',
            "name_fa"=>' تحلیل مقالات علوم اعصاب شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive neuro sciences',
            "desc_en"=>'english description',

        ]);
        $cat->tags()->create([
            "tag_key"=>'cognitive_sciences_analysis',
            "name_fa"=>' تحلیل مقالات علوم شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive sciences',
            "desc_en"=>'english description',

        ]);

        $cat=Category::create([

            "category_key"=>'cognitive_neuroscience',
            "name_fa"=>'علوم و اعصاب شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive neuroscience',
            "desc_en"=>'english description',
            "navbar"=>true,
        ]);
        $cat->tags()->create([
            "tag_key"=>'cognitive_sciences',
            "name_fa"=>'آشنایی با علوم شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive sciences',
            "desc_en"=>'english description',

        ]);
        $cat->tags()->create([
            "tag_key"=>'cognitive_neuro_sciences',
            "name_fa"=>'آشنایی با علوم اعصاب شناختی',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'cognitive neuro sciences',
            "desc_en"=>'english description',

        ]);
        $cat->tags()->create([
            "tag_key"=>'brain_mapping',
            "name_fa"=>'نقشه برداری از مغز',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'brain mapping',
            "desc_en"=>'english description',

        ]);
        $cat=Category::create([

            "category_key"=>'neurophilosophy',
            "name_fa"=>'فلسفه ذهن',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'neurophilosophy',
            "desc_en"=>'english description',
            'navbar'=>true,
        ]);
        $cat->tags()->create([
            "tag_key"=>'neurophilosophy',
            "name_fa"=>'فلسفه ذهن',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'neurophilosophy',
            "desc_en"=>'english description',

        ]);
        $cat->tags()->create([
            "tag_key"=>'lightphilosophy',
            "name_fa"=>'نور و فلسفه',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'lightphilosophy',
            "desc_en"=>'english description',

        ]);
        $cat=Category::create([

            "category_key"=>'parapsychology',
            "name_fa"=>'فراراوانشناسی',
            "desc_fa"=>'فراروانشناسی|تجربیات نزدیک به مرگ و تجربه خروج از بدن ',
            "name_en"=>'parapsychology',
            "desc_en"=>'NDE & OBE',
            "navbar"=>true,
        ]);
        $cat->tags()->create([
            "tag_key"=>'OBE',
            "name_fa"=>'تجربه خروج از بدن',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'out of body experience',
            "desc_en"=>'english description',

        ]);
        $cat->tags()->create([
            "tag_key"=>'NDE',
            "name_fa"=>'تجربه نزدیک به مرگ ',
            "desc_fa"=>'توضیحات فارسی',
            "name_en"=>'nrear death experience',
            "desc_en"=>'english description',

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
            "navbar"=>false
        ]);

    }
}
