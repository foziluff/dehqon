<?php

namespace App\Actions;

use App\Models\Field\Note\NoteImage;
use Illuminate\Http\Request;

class NoteImagesAction
{
    public function handle(Request $request, $noteId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->extension();

                $imageName = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('images/notes/'), $imageName);
                $imagePath = "/images/notes/" . $imageName;

                NoteImage::create([
                    'note_id' => $noteId,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return true;
    }
}
