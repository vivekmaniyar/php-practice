<?php
header('Content-type: image/png');

$im = imagecreatefrompng('hashirama-vs-madara.png');

$size = min(imagesx($im),imagesy($im));

$im2 = imagecrop($im,['x'=>0,'y'=>0,'width'=>$size,'height'=>$size]);

if($im2!==FALSE){
    imagepng($im2);
    imagedestory($im2);
}
imagedestroy($im);
?>