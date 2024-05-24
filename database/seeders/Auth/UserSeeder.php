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
            'phone' =>  '123123',
            'password' => bcrypt('123123'),
            'name'  =>  'Abdurazzoq',
            'surname' => 'Fozilov',
            'currency' => 'somoni',
            'born_in' => '2001-08-24',
            'gender' => 1,
            'role' => 1,
        ];

        DB::table('users')->insert($user);
    }
}
