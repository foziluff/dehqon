<?php

namespace Database\Seeders;

use App\Models\Field\Field;
use Database\Seeders\Auth\UserSeeder;
use Database\Seeders\Culture\CultureSeasonSeeder;
use Database\Seeders\Culture\CultureSeeder;
use Database\Seeders\Field\Consumption\ConsumptionCategorySeeder;
use Database\Seeders\Field\Consumption\ConsumptionNamingSeeder;
use Database\Seeders\Field\Consumption\ConsumptionOperationSeeder;
use Database\Seeders\Field\Consumption\ConsumptionProductionMeanSeeder;
use Database\Seeders\Field\Consumption\ConsumptionSeeder;
use Database\Seeders\Field\Income\IncomeSeeder;
use Database\Seeders\Field\Note\NoteImageSeeder;
use Database\Seeders\Field\Note\NoteSeeder;
use Database\Seeders\Field\Note\ProblemSeeder;
use Database\Seeders\Field\ProductQuantity\ProductQuantitySeeder;
use Database\Seeders\Field\ProductTypeSeeder;
use Database\Seeders\Field\RotationSeeder;
use Database\Seeders\Field\Work\WorkPlanSeeder;
use Database\Seeders\Field\Work\WorkSeeder;
use Database\Seeders\Field\Work\WorkStageSeeder;
use Database\Seeders\FuelType\FuelTypeSeeder;
use Database\Seeders\Irrigation\IrrigationSeeder;
use Database\Seeders\Stock\StockSeeder;
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
        $this->call(CultureSeasonSeeder::class);
        Field::factory(10)->create();
        $this->call(ProblemSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(NoteImageSeeder::class);
        $this->call(RotationSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(WorkPlanSeeder::class);
        $this->call(WorkStageSeeder::class);

        $this->call(ProductTypeSeeder::class);
        $this->call(ConsumptionCategorySeeder::class);
        $this->call(ConsumptionNamingSeeder::class);
        $this->call(ConsumptionOperationSeeder::class);
        $this->call(ConsumptionProductionMeanSeeder::class);

        $this->call(ConsumptionSeeder::class);
        $this->call(IncomeSeeder::class);
        $this->call(ProductQuantitySeeder::class);
        $this->call(StockSeeder::class);
        $this->call(IrrigationSeeder::class);
    }
}
