<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= User::create([
            'userid'=>'admin101',
            'role_id'=>1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),

        ]);
        $user= User::create([
            'userid'=>'user01',
            'role_id'=>2,
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('123456'),

        ]);
    }
}
