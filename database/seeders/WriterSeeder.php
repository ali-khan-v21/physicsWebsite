<?php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::create([
            'firstname_fa'=>'علی',
            'lastname_fa'=>'قنبری',
            'firstname_en'=>'ali',
            'lastname_en'=>'ghanbari',

        ]);
    }
}
