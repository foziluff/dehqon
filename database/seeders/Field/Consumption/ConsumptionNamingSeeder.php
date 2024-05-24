<?php

namespace Database\Seeders\Field\Consumption;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumptionNamingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('consumption_namings')->insert([
            [
                'title' => 'Газолин',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Дизельное топливо',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Фосфорные удобрения',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Калийные удобрения',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Добавьте больше начальных данных, если необходимо
        ]);
    }
}
