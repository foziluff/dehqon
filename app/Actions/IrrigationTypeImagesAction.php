<?php

namespace App\Actions;

use App\Models\Culture\CultureSeasonImage;
use App\Models\Irrigation\IrrigationType;
use App\Models\Irrigation\IrrigationTypeImage;
use Illuminate\Http\Request;

class IrrigationTypeImagesAction
{
    public function handle(Request $request, $cultureId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->extension();

                $imageName = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('images/irrigation/'), $imageName);
                $imagePath = "/images/irrigation/" . $imageName;

               IrrigationTypeImage::create([
                    'irrigation_type_id' => $cultureId,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return true;
    }
}
