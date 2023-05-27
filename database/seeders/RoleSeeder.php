<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_value'=>1,
            'name_fa'=>'سوپر ادمین',
            'name_en'=>'super admin'

        ]);
        Role::create([
            'role_value'=>2,
            'name_fa'=>'ادمین',
            'name_en'=>'admin'

        ]);
        Role::create([
            'role_value'=>3,
            'name_fa'=>'نویسنده',
            'name_en'=>'writer'

        ]);
        Role::create([
            'role_value'=>4,
            'name_fa'=>'عضو انجمن',
            'name_en'=>'association member'

        ]);
        Role::create([
            'role_value'=>5,
            'name_fa'=>'عضو وبسایت',
            'name_en'=>'website user'

        ]);
        Role::create([
            'role_value'=>6,
            'name_fa'=>'کاربر میهمان',
            'name_en'=>'guest user'

        ]);

    }
}
