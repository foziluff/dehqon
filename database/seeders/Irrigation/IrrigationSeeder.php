<?php

namespace Database\Seeders\Irrigation;

use App\Models\Irrigation\Irrigation;
use Illuminate\Database\Seeder;

class IrrigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $irrigationMethods = [
            [
                'ru' => 'Капельное орошение',
                'uz' => 'Tomchilatib sug\'orish',
                'tj' => 'Обмони қатрагӣ'
            ],
            [
                'ru' => 'Спринклерное орошение',
                'uz' => 'Sprinkler sug\'orish',
                'tj' => 'Обмони пошхӯрӣ'
            ],
            [
                'ru' => 'Поверхностное орошение',
                'uz' => 'Yuzaki sug\'orish',
                'tj' => 'Обмони рӯизаминӣ'
            ],
            [
                'ru' => 'Подпочвенное орошение',
                'uz' => 'Yer osti sug\'orish',
                'tj' => 'Обмони зеризаминӣ'
            ],
            [
                'ru' => 'Центробежное орошение',
                'uz' => 'Markazdan qochma sug\'orish',
                'tj' => 'Обмони марказгурезӣ'
            ],
            [
                'ru' => 'Боковое движение орошения',
                'uz' => 'Yon harakat sug\'orish',
                'tj' => 'Обмони ҳаракати паҳлӯӣ'
            ],
            [
                'ru' => 'Ручное орошение',
                'uz' => 'Qo\'lda sug\'orish',
                'tj' => 'Обмони дастӣ'
            ],
            [
                'ru' => 'Автоматическое орошение',
                'uz' => 'Avtomatik sug\'orish',
                'tj' => 'Обмони худкор'
            ],
            [
                'ru' => 'Микроорошение',
                'uz' => 'Mikro sug\'orish',
                'tj' => 'Обмони хурд'
            ],
            [
                'ru' => 'Поверхностное орошение',
                'uz' => 'Yuzaki sug\'orish',
                'tj' => 'Обмони рӯизаминӣ'
            ],
        ];

        foreach ($irrigationMethods as $method) {
            Irrigation::factory()->create([
                'title_ru' => $method['ru'],
                'title_uz' => $method['uz'],
                'title_tj' => $method['tj'],
                'user_id' => 1,
                'image_path' => '/files/images/1716890967_6655ad57de75b.png',
            ]);
        }

    }

}
