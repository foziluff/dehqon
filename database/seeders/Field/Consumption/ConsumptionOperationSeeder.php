<?php

namespace Database\Seeders\Field\Consumption;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumptionOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consumption_operations')->insert([
            [
                'title_ru' => 'Полив',
                'title_uz' => 'Sug‘orish',
                'title_tj' => 'Обсигор',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Внесение удобрений',
                'title_uz' => 'O‘g‘it qo‘shish',
                'title_tj' => 'Масҳабу о’згартириш',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Обработка почвы',
                'title_uz' => 'Yer ishlov berish',
                'title_tj' => 'Забт йиморо',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Уборка урожая',
                'title_uz' => 'Hosil yig‘ish',
                'title_tj' => 'Ҳосил ҷамъоварӣ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
