<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name_fa'=>'علی قنبری',
            'name_en'=>'ali ghanbari',
            'password'=>'123456',
            "email"=>'alighanbari113@gmail.com'

        ]);
        
        User::create([
            'name_fa'=>'محمدرضا واحد',
            'name_en'=>'mohammadreza Vahed',
            'email'=>'example@gmail.com',
            'password'=>'123456'
        ]);
    }
}
