<?php

namespace Database\Seeders\Field\Consumption;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('consumptions')->insert([
            [
                'date' => Carbon::now(),
                'user_id' => 1,
                'field_id' => 1,
                'product_type_id' => 1,
                'culture_id' => 1,
                'consumption_category_id' => 1,
                'consumption_operation_id' => 1,
                'consumption_production_mean_id' => 1,
                'consumption_naming_id' => 1,
                'quantity' => 100,
                'quantity_unit' => 'kg',
                'price' => '150.00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
