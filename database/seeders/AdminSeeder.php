<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username'=>'alighanbari113@gmail.com',
            'password'=>'password'
        ]);
        //CREATE TABLE admin ;
        //INSERT INTO admin VALUES ();
    }
}