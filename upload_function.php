<?php
/******
upload image 
******/

function upload_img(){
	
$originalFile= $_FILES['item_img'];
if($originalFile['size']>0){
	
ini_set('memory_limit', '100M');///might have to be commented out on some php servers

$dimensions = getimagesize($originalFile['tmp_name']);



if($dimensions[0]>0){

if($dimensions[0]>=$dimensions[1]){
	
	$desiredW= 950;
	$desiredH= number_format($dimensions[1] /$dimensions[0] *$desiredW,2);
	}
	
	if($dimensions[1]>$dimensions[0]){
	$desiredH= 950;
	$desiredW= number_format($dimensions[0] /$dimensions[1] *$desiredH,2);
	}
$dest= imagecreatetruecolor($desiredW, $desiredH);

imageantialias($dest, TRUE);

switch($dimensions[2])
    {
       case 1:       //GIF
           $src = imagecreatefromgif($originalFile['tmp_name']);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($originalFile['tmp_name']);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($originalFile['tmp_name']);
           break;
       default:
           return false;
           break;
    }
imagecopyresampled($dest, $src, 0, 0, 0, 0, $desiredW, $desiredH, $dimensions[0], $dimensions[1]);


$shortname=substr($originalFile['name'], 0, -4);
	
		if (strlen($shortname)>8){
		$shortname=substr($shortname, 0, 7);
	}

$timestamp=substr(time(), -4, -5);
		
$imageNewName = $shortname.$timestamp;
$imageNewName  = strtolower($imageNewName);



$imageNewName =str_replace(" ", "_",$imageNewName);
$imageNewName =str_replace(".", "_",$imageNewName);
$imageNewName = str_replace("#", "_", $imageNewName);
$imageNewName = str_replace("&", "_", $imageNewName);

$imageNewName=$imageNewName.".jpg";


$destURL="item_images/".$imageNewName;

imagejpeg($dest,$destURL, 75);

}else{
$imageNewName="generic.jpg";
}
return $imageNewName;

}else{
$imageNewName="generic.jpg";
return $imageNewName;
	
}

}