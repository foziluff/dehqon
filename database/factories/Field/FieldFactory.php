<?php

namespace Database\Factories\Field;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cultureId = 1;
        $fuelTypeId = 1;
        $prevCultureId = 1;
        $userId = 1;

        return [
            'title' => $this->faker->word,
            'culture_id' => $cultureId,
            'sort' => $this->faker->word,
            'area' => $this->faker->randomFloat(2, 1, 20),
            'fuel_type_id' => $fuelTypeId,
            'sowing_year' => $this->faker->year,
            'prev_culture_id' => $prevCultureId,
            'prev_sort' => $this->faker->word,
            'prev_sowing_year' => $this->faker->year,
            'user_id' => $userId,
            'coordinates' => json_encode([
                ['latitude' => $this->faker->latitude, 'longitude' => $this->faker->longitude],
                ['latitude' => $this->faker->latitude, 'longitude' => $this->faker->longitude],
                ['latitude' => $this->faker->latitude, 'longitude' => $this->faker->longitude],
            ]),
        ];
    }
}
