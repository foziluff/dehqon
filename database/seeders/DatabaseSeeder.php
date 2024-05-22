<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(FuelTypeSeeder::class);
        $this->call(CultureSeeder::class);
        Field::factory(10)->create();
        $this->call(ProblemSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(NoteImageSeeder::class);
        $this->call(RotationSeeder::class);

    }
}
