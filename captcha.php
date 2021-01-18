<?php session_start();
$text = rand(10000,99999);
$_SESSION["vercode2"] = $text;
$height = 35;
$width = 65;

$image_p = imagecreate($width, $height);
//187ccc
$black = imagecolorallocate($image_p, 24,124,204);
$white = imagecolorallocate($image_p, 255, 255, 255);
$font_size = 18;

imagestring($image_p, $font_size, 10, 10, $text, $white);
imagejpeg($image_p, null, 80);
?>