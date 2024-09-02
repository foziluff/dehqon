<?php

namespace Database\Seeders\Field\Note;

use App\Models\Field\Note\Problem;
use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $problems = [
            [
                'title_ru' => 'Вредители',
                'title_uz' => 'Zararkunandalar',
                'title_tj' => 'Зараррасонҳо',
            ],
            [
                'title_ru' => 'Сорняки',
                'title_uz' => 'Begona otlar',
                'title_tj' => 'Аловпарастҳо',
            ],
            [
                'title_ru' => 'Болезнь',
                'title_uz' => 'Kasallik',
                'title_tj' => 'Бемори',
            ],
            [
                'title_ru' => 'Другое',
                'title_uz' => 'Boshqa',
                'title_tj' => 'Дигарон',
            ],
        ];

        foreach ($problems as $problem) {
            Problem::factory()->create(array_merge($problem, ['user_id' => 1]));
        }
    }
}
