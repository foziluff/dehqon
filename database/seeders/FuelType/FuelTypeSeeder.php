<?php

namespace Database\Seeders\FuelType;

use App\Models\FuelType\FuelType;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fuelTypes = [
            ['ru' => 'Бензин', 'uz' => 'Бензин', 'tj' => 'Бензин'],
            ['ru' => 'Дизель', 'uz' => 'Дизел', 'tj' => 'Дизел'],
            ['ru' => 'Электричество', 'uz' => 'Электр энергия', 'tj' => 'Барқ'],
            ['ru' => 'Природный газ', 'uz' => 'Табиий газ', 'tj' => 'Гази табии'],
        ];

        foreach ($fuelTypes as $fuelType) {
            FuelType::create([
                'title_ru' => $fuelType['ru'],
                'title_uz' => $fuelType['uz'],
                'title_tj' => $fuelType['tj'],
            ]);
        }
    }
}
