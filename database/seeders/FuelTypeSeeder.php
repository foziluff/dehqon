<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fuelTypes = [
            'Бензин',
            'Дизель',
            'Электричество',
            'Природный газ',
        ];

        foreach ($fuelTypes as $fuelType) {
            FuelType::create(['title' => $fuelType]);
        }
    }
}
