<?php

header("content-type:text/html;charset=utf-8");
//$_FILES;
//print_r($_FILES);
// $filename = $_FILES['myFile']['name'];
// $type = $_FILES['myFile']['type'];
// $tmp_name = $_FILES['myFile']['tmp_name'];
// $error = $_FILES['myFile']['error'];
// $size = $_FILES['myFile']['size'];
/**
 * 单文件上传
 * @param  $fileInfo
 * @param  string $path
 * @param  array $allowExt
 * @param  $maxSize
 * @param  boolean $imgFlag
 * @return $mes
 */
function uploadFile($fileInfo,$path="uploads",$allowExt=array("gif","jpeg","jpg","png","wbmp"),$maxSize=1048576,$imgFlag=true){
	// $allowExt = array("gif","jpeg","jpg","png","wbmp");//上传文件类型数组
	// $maxSize = 1048576;//限制最大大小
	// $imgFlag = true;//只让传图片类型的，不让只修改过扩展名的文件上传
	//第一步，判断错误信息
	if($fileInfo['error'] == 0){
		//限制上传文件类型
		$ext = getExit($fileInfo['name']);
		if(!in_array($ext,$allowExt)){
			exit("非法文件类型");
		}
		if ($fileInfo['size']>$maxSize) {
			exit("文件过大");
		}
		if($imgFlag){
			//如何验证图片是否是一个真正的图片类型
			//getimagesize($filename):验证文件是否是图片类型
			$info = getimagesize($fileInfo['tmp_name']);
			if(!$info){
				exit("不是真正的图片类型");
			}
		}
		//需要判断下文件是否是通过HTTP POST方式上传来的
		//is_uploaded_file($tmp_name):
		//获得文件的扩展名
		// $path = "uploads";
		if(!file_exists($path)){//如果文件不存在,file_exists() 函数检查文件或目录是否存在。
			mkdir($path,0777,true);//创建文件夹
		}
		$fileInfo['name'] = getUniName().".".$ext;//将唯一字符串加上扩展名
		$destination = $path."/".$fileInfo['name'];
		if(is_uploaded_file($fileInfo['tmp_name'])){ //如果 file 所给出的文件是通过 HTTP POST 上传的则返回 TRUE。
			if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
				$mes = "文件上传成功";
			}else{
				$mes = "文件移动失败";
			}
		}else{$mes = "文件不是通过HTTP POST方式上传来的！";
		}
	}else{ 
		switch ($fileInfo['error']) {
			case 1:
				$mes = "超过了配置文件上传文件大小";
				break;
			case 2:
				$mes = "超过了表单设置上传文件的大小";
				break;
			case 3:
				$mes = "文件部分被上传";
				break;
			case 4:
				$mes = "没有文件被上传";
				break;
			case 6:
				$mes = "没有找到临时目录";
				break;
			case 7:
				$mes = "文件不可写";
				break;	
			case 8:
				$mes = "由于PHP的扩展程序中断了文件上传";
				break;
		}
	}
	return $mes;

}


function buildInfo(){
	$i = 0;
	foreach ($_FILES as $v) {
		//单文件
		if (is_string($v['name'])) {
			$files[$i]=$v;
			$i++;
		}else{
			// 多文件
			foreach ($v['name'] as $key => $val){
				$files[$i]['name']=$val;
				$files[$i]['size']=$v['size'][$key];
				$files[$i]['tmp_name']=$v['tmp_name'][$key];
				$files[$i]['error']=$v['error'][$key];
				$files[$i]['type']=$v['type'][$key];
				$i++;
			}
		}
	}
	return $files;
}

//===================================
//  多文件上传
// ==================================
function uploadFiles($path="uploads",$allowExt=array("gif","jpeg","jpg","png","wbmp"),$maxSize=1048576,$imgFlag=true){
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	$i = 0;
	$files=buildInfo();
	foreach ($files as $file) {
		if($file['error']== 0){
			$ext=getExit($file['name']);
			//检查文件的扩展名
			if(!in_array($ext, $allowExt)){
				exit('非法文件类型');
			}
			// 检验是否是一个真正的突破类型
			if ($imgFlag) {
				if (!getimagesize($file['tmp_name'])) {
					exit('不是图片类型');
				}
			}
			if ($file['size']>$maxSize) {
				exit('上传文件过大');
			}
			if (!is_uploaded_file($file['tmp_name'])) {
				exit('不是通过HTTP POST方式上传上来的');
			}
			$filename = getUniName().".".$ext;;
			$destination = $path."/".$filename;
			if(move_uploaded_file($file['tmp_name'], $destination)){
				$file['name'] = $filename;
				unset($file['error'],$file['tmp_name'],$file['siza'],$file['type']);//注销掉
				$uploadedFiles[$i]=$file;
				$i++;
			}
		}else{ 
			switch ($file['error']) {
				case 1:
					$mes = "超过了配置文件上传文件大小";
					break;
				case 2:
					$mes = "超过了表单设置上传文件的大小";
					break;
				case 3:
					$mes = "文件部分被上传";
					break;
				case 4:
					$mes = "没有文件被上传";
					break;
				case 6:
					$mes = "没有找到临时目录";
					break;
				case 7:
					$mes = "文件不可写";
					break;	
				case 8:
					$mes = "由于PHP的扩展程序中断了文件上传";
					break;
			}
			echo $mes;
		}
	}
	return $uploadedFiles;
}