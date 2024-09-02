<?php

namespace Database\Seeders\Field\Consumption;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumptionProductionMeanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consumption_production_means')->insert([
            [
                'title_ru' => 'Трактор',
                'title_uz' => 'Traktor',
                'title_tj' => 'Трактор',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Комбайн',
                'title_uz' => 'Kombayn',
                'title_tj' => 'Комбайн',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Ручная работа',
                'title_uz' => 'Qo‘l mehnati',
                'title_tj' => 'Коргарии дастӣ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Самоходная техника',
                'title_uz' => 'O‘z-o‘zini harakatga keltiruvchi texnika',
                'title_tj' => 'Техникаи худрав',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
