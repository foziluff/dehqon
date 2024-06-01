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
            'Капельное орошение',
            'Спринклерное орошение',
            'Поверхностное орошение',
            'Подпочвенное орошение',
            'Центробежное орошение',
            'Боковое движение орошения',
            'Ручное орошение',
            'Автоматическое орошение',
            'Микроорошение',
            'Поверхностное орошение',
        ];

        foreach ($irrigationMethods as $method) {
            Irrigation::factory()->create(['title' => $method, 'user_id' => 1, 'image_path' => '/files/images/1716890967_6655ad57de75b.png']);

        }
    }

}
