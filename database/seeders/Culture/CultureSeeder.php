<?php

namespace Database\Seeders\Culture;

use App\Models\Culture\Culture;
use Illuminate\Database\Seeder;

class CultureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fruits = [
            'Яблоко',
            'Груша',
            'Банан',
            'Апельсин',
            'Манго',
            'Ананас',
            'Киви',
            'Персик',
            'Слива',
            'Виноград',
        ];

        foreach ($fruits as $fruit) {
            Culture::factory()->create(['title' => $fruit, 'user_id' => 1, 'image_path' => '/files/images/1716890967_6655ad57de75b.png']);
        }
    }
}
