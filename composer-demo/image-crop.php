<?php

require "vendor/autoload.php";

use Intervention\Image\ImageManagerStatic as Image;

$image = Image::make('public/thor-ragnorok-wallpaper.jpg')
    ->crop(100,200)
    ->save('img/thor-cropped.jpg',100);
?>