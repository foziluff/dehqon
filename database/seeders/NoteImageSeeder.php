<?php

namespace Database\Seeders;

use App\Models\NoteImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 0; $i < 4; $i++) {
            NoteImage::create(['image_path' => "/images/notes/1716359399_664d90e799a8a.jpg", 'note_id' => 1]);
        }
    }
}
