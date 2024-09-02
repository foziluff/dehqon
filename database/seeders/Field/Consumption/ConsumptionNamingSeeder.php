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
                'title_ru' => 'Газолин',
                'title_uz' => 'Benzin',
                'title_tj' => 'Бензин',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Дизельное топливо',
                'title_uz' => 'Dizel yoqilg‘i',
                'title_tj' => 'Дизел',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Фосфорные удобрения',
                'title_uz' => 'Fosforli o‘g‘itlar',
                'title_tj' => 'Фосфор',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Калийные удобрения',
                'title_uz' => 'Kaliyli o‘g‘itlar',
                'title_tj' => 'Калий',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
