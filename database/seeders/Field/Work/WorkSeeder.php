<?php

namespace Database\Seeders\Field\Work;

use App\Models\Field\Work\Work;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            [
                'title_ru' => 'Посев',
                'title_uz' => 'Ekish',
                'title_tj' => 'Кори',
            ],
            [
                'title_ru' => 'Уборка урожая',
                'title_uz' => 'Hosil yig‘ish',
                'title_tj' => 'Ҳосил ҷамъоварӣ',
            ],
            [
                'title_ru' => 'Полив',
                'title_uz' => 'Sug‘orish',
                'title_tj' => 'Обсигор',
            ],
            [
                'title_ru' => 'Внесение удобрений',
                'title_uz' => 'O‘g‘it qo‘shish',
                'title_tj' => 'Масҳабу о’згартириш',
            ],
            [
                'title_ru' => 'Пестицидная обработка',
                'title_uz' => 'Pestitsidlarni qayta ishlash',
                'title_tj' => 'Роҳҳои зидди ҳашарот',
            ],
            [
                'title_ru' => 'Обрезка растений',
                'title_uz' => 'O‘simliklarni kesish',
                'title_tj' => 'Буридан',
            ],
            [
                'title_ru' => 'Аэрация почвы',
                'title_uz' => 'Yer havo bilan ta’minlash',
                'title_tj' => 'Ҳаво дастрас кардани замин',
            ],
            [
                'title_ru' => 'Пересадка',
                'title_uz' => 'Ko‘chatni ko‘chirish',
                'title_tj' => 'Ҳудуд',
            ],
            [
                'title_ru' => 'Мониторинг вредителей',
                'title_uz' => 'Zararkunandalarni kuzatish',
                'title_tj' => 'Мусоидат ва мониторинг',
            ],
            [
                'title_ru' => 'Подготовка почвы',
                'title_uz' => 'Yerni tayyorlash',
                'title_tj' => 'Тайёрлаш',
            ],
        ];

        foreach ($works as $work) {
            Work::create(array_merge($work, ['user_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]));
        }
    }
}
