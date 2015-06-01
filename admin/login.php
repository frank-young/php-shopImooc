<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="慕课网"></a>
			</div>
			<h3 class="welcome_title">欢迎登陆</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
	<form action="doLogin.php" method="POST">
		<ul class="login">
			<li class="l_tit">用户名</li>
			<li class="mb_10"><input name="username" placehoder="请输入管理员账户" type="text" class="login_input user_icon"></li>
			<li class="l_tit">密码</li>
			<li class="mb_10"><input name="password" type="password" class="login_input user_icon"></li>
			<li class="l_tit">验证码</li>
			<li class="mb_10"><input name="verify" type="text" class="login_input " style="width:100px;">
			<img src="getVerify.php" alt="验证码" />
			</li>
			<li class="autoLogin"><input name="autoFlag" type="checkbox" id="a1" class="checked">
			<label for="a1">自动登陆(一周之内)</label></li>


			<li><input type="submit" value="" class="login_btn"></li>
		</ul>
	</form>
		<div class="login_partners">
			
		</div>
	</div>
	<a class="reg_link" href="#"></a>
</div>

<div class="hr_25"></div>
<div class="footer">
	
</div>
</body>
</html>
