<?php

namespace Database\Seeders\Field\Work;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'date' => now(),
//                'work_id' => 1,
                'material' => 'Material Name 1',
                'material_quantity' => 10,
                'material_quantity_unit' => 'kg',
                'created_at' => now(),
                'work_plan_id' => 1,
                'updated_at' => now(),
                'user_id' => 1,
            ],
            [
                'date' => now(),
//                'work_id' => 1,
                'material' => 'Material Name 2',
                'material_quantity' => 20,
                'material_quantity_unit' => 'lbs',
                'work_plan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
            ],
        ];

        DB::table('work_stages')->insert($data);
    }
}
