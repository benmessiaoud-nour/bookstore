<?php

namespace App\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Or Imagick if you prefer

trait ImageUploadTrait
{
    protected $image_path  = "app/public/images";
    protected $img_height = 600;
    protected $img_width  = 600;

    public function uploadImage($img)
    {
        $img_name = $this->imageName($img);

        // Create ImageManager instance (with GD driver)
        $manager = new ImageManager(new Driver());

        // Read uploaded file
        $image = $manager->read($img->getPathname());

        // Resize & save
        $image->resize($this->img_width, $this->img_height)
            ->save(storage_path($this->image_path.'/'.$img_name));

        // Return relative path for DB
        return "images/" . $img_name;
    }

    protected function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
