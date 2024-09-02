<?php

namespace Database\Seeders\Field\Consumption;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('consumption_categories')->insert([
            [
                'title_ru' => 'Топливо',
                'title_uz' => 'Yoqilg‘i',
                'title_tj' => 'Сӯзишворӣ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Удобрения',
                'title_uz' => 'O‘g‘itlar',
                'title_tj' => 'Удҳ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Средства защиты растений',
                'title_uz' => 'O‘simliklarni himoya qilish vositalari',
                'title_tj' => 'Воситаҳои ҳимояи растаниҳо',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title_ru' => 'Семена',
                'title_uz' => 'Urug‘lar',
                'title_tj' => 'Тухм',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
