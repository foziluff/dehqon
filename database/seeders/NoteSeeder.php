<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            [
                'field_id' => 1,
                'user_id' => 1,
                'date' => now(),
                'problem_id' => 1,
                'description' => 'Описание заметки 1',
                'defeated_area' => 10.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
