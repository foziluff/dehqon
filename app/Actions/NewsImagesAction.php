<?php

namespace App\Actions;

use App\Models\News\NewsImage;
use Illuminate\Http\Request;

class NewsImagesAction
{
    public function handle(Request $request, $noteId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->extension();

                $imageName = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('images/news/'), $imageName);
                $imagePath = "/images/news/" . $imageName;

                NewsImage::create([
                    'news_id' => $noteId,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return true;
    }
}
