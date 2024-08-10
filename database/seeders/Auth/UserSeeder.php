<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'phone' =>  '992002887717',
            'password' => bcrypt('992002887717'),
            'name'  =>  'Abdurazzoq',
            'surname' => 'Fozilov',
            'currency' => 'somoni',
            'born_in' => '2001-08-24',
            'gender' => 1,
            'role' => 1,
        ];
        $user2 = [
            'phone' =>  '992929380088',
            'password' => bcrypt('1234'),
            'name'  =>  'test',
            'organization_id'  =>  1,
            'surname' => 'test',
            'currency' => 'smn',
            'born_in' => '2001-08-24',
            'gender' => 1,
            'role' => 1,
        ];

        DB::table('users')->insert($user);
        DB::table('users')->insert($user2);
    }
}
