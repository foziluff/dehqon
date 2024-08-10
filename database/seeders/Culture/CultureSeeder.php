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
            ['ru' => 'Яблоко', 'uz' => 'Olma', 'tj' => 'Себ'],
            ['ru' => 'Груша', 'uz' => 'Nok', 'tj' => 'Нок'],
            ['ru' => 'Банан', 'uz' => 'Banan', 'tj' => 'Банан'],
            ['ru' => 'Апельсин', 'uz' => 'Apelsin', 'tj' => 'Апелсин'],
            ['ru' => 'Манго', 'uz' => 'Mango', 'tj' => 'Мангo'],
            ['ru' => 'Ананас', 'uz' => 'Ananas', 'tj' => 'Ананас'],
            ['ru' => 'Киви', 'uz' => 'Kivi', 'tj' => 'Киви'],
            ['ru' => 'Персик', 'uz' => 'Shaftoli', 'tj' => 'Шафтан'],
            ['ru' => 'Слива', 'uz' => 'Olxori', 'tj' => 'Сиёхмех'],
            ['ru' => 'Виноград', 'uz' => 'Uzum', 'tj' => 'Ангур'],
        ];

        foreach ($fruits as $fruit) {
            Culture::factory()->create([
                'title_ru' => $fruit['ru'],
                'title_uz' => $fruit['uz'],
                'title_tj' => $fruit['tj'],
                'user_id' => 1,
                'image_path' => '/files/images/1716890967_6655ad57de75b.png'
            ]);
        }
    }
}
