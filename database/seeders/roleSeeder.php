<?php

namespace Database\Seeders;
use App\Models\role;

use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =role::create(['name'=>'admin']);
        $user =role::create(['name'=>'user']);
        $suspend =role::create(['name'=>'suspend']);
    }
}
