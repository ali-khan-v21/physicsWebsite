<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usr=User::create([
            'role_id'=>1,
            'firstname_fa'=>'علی',
            'lastname_fa'=>'قنبری',
            'firstname_en'=>'ali',
            'lastname_en'=>'ghanbari',
            'password'=>'$2y$10$zvd3ScZw4VgCuCOqjx8L8.IdF9SxRT1tqEELgxXY7TmR7ex9Dokci',
            "email"=>'alighanbari113@gmail.com'

        ]);
        $prf=$usr->profile()->create();
        $prf->image()->create(['image_url'=>'users/default.jpg']);

        // $test->image()->create(["image_url"=>'test.jpg']);



        $usr=User::create([
            'role_id'=>2,
            'firstname_fa'=>'محمدرضا',
            'lastname_fa'=>'واحد',
            'firstname_en'=>'mohammadreza',
            'lastname_en'=>'Vahed',
            'email'=>'example@gmail.com',
            'password'=>'$2y$10$zvd3ScZw4VgCuCOqjx8L8.IdF9SxRT1tqEELgxXY7TmR7ex9Dokci'
        ]);
        $prf=$usr->profile()->create();
        $prf->image()->create(['image_url'=>'users/default.jpg']);


    }
}
