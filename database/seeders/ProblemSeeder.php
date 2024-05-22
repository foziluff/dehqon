<?php

namespace Database\Seeders;

use App\Models\Problem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $problems = [
            'Вредители',
            'Сорняки',
            'Болезнь',
            'Другое',
        ];

        foreach ($problems as $problem) {
            Problem::factory()->create(['title' => $problem, 'user_id' => 1]);
        }
    }
}
