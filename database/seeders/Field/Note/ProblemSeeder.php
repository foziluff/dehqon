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
