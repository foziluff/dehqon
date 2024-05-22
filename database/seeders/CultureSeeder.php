<?php

namespace Database\Seeders;

use App\Models\Culture;
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
            Culture::factory()->create(['title' => $fruit, 'user_id' => 1]);
        }
    }
}
