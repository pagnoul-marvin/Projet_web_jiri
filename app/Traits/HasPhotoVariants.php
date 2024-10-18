<?php

namespace App\Traits;

use Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait HasPhotoVariants
{
    public function makeImageVariants($original_path): void
    {

        $sizes = Config::get('photos.sizes');
        foreach ($sizes as $size => $value) {

            if (is_null($value)) {
                continue;
            }
            $photo = Image::read(Storage::get($original_path['photo']));

            if (is_array($value)) {
                $photo->cover($value['width'], $value['height']);
            } else {
                $photo->scale($value);
            }
            $file = str_replace('original', $size, $original_path['photo']);
            $directory = dirname($file);

            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            Storage::put($file, $photo->encode());
        }
    }
}
