<?php

namespace App\Actions;

use App\Models\Culture\CultureSeasonImage;
use Illuminate\Http\Request;

class CultureImagesAction
{
    public function handle(Request $request, $cultureId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->extension();

                $imageName = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('images/cultures/'), $imageName);
                $imagePath = "/images/cultures/" . $imageName;

                CultureSeasonImage::create([
                    'culture_season_id' => $cultureId,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return true;
    }
}
