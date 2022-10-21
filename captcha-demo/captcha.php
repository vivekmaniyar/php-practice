<?php
session_start();

// Set the content-type
header('Content-type: image/png');

// Create the image
$im = imagecreatetruecolor(200, 50);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 199, 49, $white);

// The text to draw
$code = rand(1000,9999);
$_SESSION['code'] = $code;

// Replace path by your own font path
$font = 'arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $code);

// Add the text
imagettftext($im, 20, 0, 10, 20, $black, $font, $code);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>