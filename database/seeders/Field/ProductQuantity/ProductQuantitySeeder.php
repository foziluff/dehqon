<?php

namespace Database\Seeders\Field\ProductQuantity;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductQuantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_quantities')->insert([
            [
                'date' => Carbon::now(),
                'user_id' => 1,
                'field_id' => 1,
                'product_type_id' => 1,
                'culture_id' => 1,
                'quantity' => 100,
                'quantity_unit' => 'kg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
