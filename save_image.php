<?php $imagedata = base64_decode($_POST['imgdata']);
$filename = md5(uniqid(rand(), true));
//path where you want to upload image
$file = $_SERVER['DOCUMENT_ROOT'] . '/images/'.$filename.'.png';
$imageurl  = 'http://localhost:8181/bingdotcom/images/'.$filename.'.png';
file_put_contents($file,$imagedata);
echo $imageurl;
?>