<?php

namespace App\Actions;

class UserPhotoPathAction
{
    public function handle($request)
    {
        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/avatars'), $imageName);
            $imagePath = ['image_path' => "/images/avatars/" . $imageName];
            $request->merge($imagePath);
        }

        return $request;
    }
}
