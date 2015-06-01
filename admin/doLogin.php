<?php
require_once '../include.php';
session_start();
$username= $_POST['username'];
$username=mysql_escape_string($username);//防止sql注入
$password = $_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];

$autoFlag = $_POST['autoFlag'];


if($verify == $verify1){ 
$sql = "select * from imooc_admin where username='{$username}' and password='{$password}'";
$row = checkAdmin($sql);
		if($row){ 
			//如果选了一周内自动登陆
			if($autoFlag){ 
				setcookie("adminId",$row['id'],time()+7*24*3600);
				setcookie("adminName",$row['username'],time()+7*24*3600);
			}

			$_SESSION['adminName']=$row['username'];
			$_SESSION['adminId']=$row['id'];
			alertMes("登录成功","index.php");

		}else{ 
			alertMes("账号或密码错误","login.php");
		}

}else{ 

		alertMes("验证码错误","login.php");

}

