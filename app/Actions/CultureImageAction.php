<?php

namespace App\Actions;


class CultureImageAction
{
    public function handle($request)
    {
        if ($request->image) {
            $fileName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('files/images'), $fileName);
            $filePath = ['image_path' => "/files/images/" . $fileName];
            $request->merge($filePath);
        }

        return $request;
    }
}
