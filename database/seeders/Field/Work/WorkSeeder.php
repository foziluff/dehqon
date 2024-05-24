<?php

namespace Database\Seeders\Field\Work;

use App\Models\Field\Work\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            'Посев',
            'Уборка урожая',
            'Полив',
            'Внесение удобрений',
            'Пестицидная обработка',
            'Обрезка растений',
            'Аэрация почвы',
            'Пересадка',
            'Мониторинг вредителей',
            'Подготовка почвы',
        ];

        foreach ($works as $work) {
            Work::create(['title' => $work, 'user_id' => 1,]);
        }
    }
}
