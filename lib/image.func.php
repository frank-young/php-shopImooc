<?php 

require_once 'string.func.php';
/**
 * 通过GD库做验证码 
 * @param  $type
 * @param  $length
 * @param  $pixel
 * @param  $line
 */
function verifyImage($type = 1,$length = 4,$pixel =0,$line=5){ 
session_start();
$width = 80;
$height = 28;
$image = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
//用填充矩形来填充画布
imagefilledrectangle($image, 1, 1, $width-2, $height-2,$white);

$chars = buildRandomString($type,$length);

$_SESSION['verify'] = $chars;//用来比对用户输入的验证码，放在session中
$fontfiles = array("msyh.ttc","msyhbd.ttc","msyhl.ttc","simhei.ttf","simkai.ttf","simsun.ttc");//定义数组，存放字体
for($i=0;$i<$length;$i ++){ 
	$size=mt_rand(14,18);//随机的字体大小
	$angle = mt_rand(-15,15);//随机的角度
	$x=5+$i*$size;
	$y=mt_rand(20,26);
	$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
	$color = imagecolorallocate($image,mt_rand(50,90), mt_rand(80,200), mt_rand(90,180));//随机颜色
	$text = substr($chars,$i,1);

	imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
}
//有值才画干扰元素；
if($pixel){
	for($i=0;$i<50;$i++){ 
		imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $black);

	}
}

if($line){ 
	for($i=1;$i<$line;$i++){ 
		$color = imagecolorallocate($image,mt_rand(50,90), mt_rand(80,200), mt_rand(90,180));//随机颜色
		imageline($image, mt_rand(0,$width-1),  mt_rand(0,$height-1), mt_rand(0,$width-1),  mt_rand(0,$height-1), $color);
	}
}

header("content-type:image/gif");
imagegif($image);
imagedestroy($image);
}


//生成缩略图
/**
 * 生成缩略图
 * @param  $filename
 * @param  $destination
 * @param  float $scale
 * @param  $dst_w
 * @param  $dst_h
 * @param  $isReservedSource
 * @return $dstFilename
 */
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype) = getimagesize($filename);
	$scale = 0.5;
	if(is_null($dst_w)||is_null($dst_h)){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime = image_type_to_mime_type($imagetype);
	$createFun = str_replace("/", "createfrom", $mime);
	$outFun = str_replace("/", null, $mime);
	$src_image = $createFun($filename);
	$dst_image = imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	//image_50/dsadwqrwqcsas.jpg
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename = $destination==null?getUniName().".".getExit($filename):$destination;
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	// $isReservedSource=false;//不保留源文件
	if(!$isReservedSource){
		unlink($filename);
	}
	return $dstFilename;
}
