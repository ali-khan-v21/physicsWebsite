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
            'role_value'=>'superadmin',
            'name_fa'=>'سوپر ادمین',
            'name_en'=>'super admin'

        ]);
        Role::create([
            'role_value'=>'admin',
            'name_fa'=>'ادمین',
            'name_en'=>'admin'

        ]);
        Role::create([
            'role_value'=>'writer',
            'name_fa'=>'نویسنده',
            'name_en'=>'writer'

        ]);
        Role::create([
            'role_value'=>'associationuser',
            'name_fa'=>'عضو انجمن',
            'name_en'=>'association user'

        ]);
        Role::create([
            'role_value'=>'siteuser',
            'name_fa'=>'عضو وبسایت',
            'name_en'=>'website user'

        ]);

    }
}
