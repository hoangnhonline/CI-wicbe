<?php    // File: capcha.php
header("Content-Type: image/jpeg");
header("Pragma: No-cache");
header("Cache-Control:No-cache, Must-revalidate"); 

$sokytu=5;  $width = 90; 	$height = 30; 

$img = ImageCreate($width, $height); 
$nen = ImageColorAllocate($img, 0, 51, 0); // tạo các màu cần dùng
$mauchu = ImageColorAllocate($img, 255, 255, 255); 
$vien = ImageColorAllocate($img, 127, 127, 127); 

$str= md5(rand(0,9999)); 
$str = substr($str, 10, $sokytu); 
session_start(); $_SESSION['captcha_code'] = $str; 

ImageFill($img, 0, 0, $nen); //tô nền 
for ($i=0; $i<=$height; $i+=10) ImageLine($img, 0, $i, $width, $i, $vien); 
for ($i=0; $i<=$width; $i+=10) ImageLine($img, $i, 0, $i, $height, $vien); 

ImageString($img, 5, 20, 8, $str, $mauchu);  //vẽ chuỗi số
ImageJPEG($img); //xuất hình ra browser
ImageDestroy($img); 
?>
