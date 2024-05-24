<?php

namespace Database\Seeders\Field;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rotations = [
            [
                'field_id' => 1,
                'culture_id' => 1,
                'culture_sort' => 'оли',
                'user_id' => 1,
                'sowing_date' => now(),
                'harvesting_date' => now()->addMonths(3),
                'average_yield' => 1000,
                'average_yield_unit' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('rotations')->insert($rotations);
    }
}
