<?php

namespace Database\Seeders\Field\Work;

use App\Models\Field\Field;
use App\Models\Field\Work\WorkPlan;
use Illuminate\Database\Seeder;

class WorkPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fields = Field::all();

        foreach ($fields as $field) {
            WorkPlan::create([
                'user_id' => 1,
                'title' => 'Work Plan for ' . $field->title,
                'field_id' => $field->id,
            ]);
        }
    }
}
