<?php

namespace Database\Seeders\Stock;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            [
                'date' => Carbon::now(),
                'user_id' => 1,
                'quantity' => 100,
                'title' => 'Title',
                'quantity_unit' => 'kg',
                'price' => 10.50,
                'consumption_production_mean_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
