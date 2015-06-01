<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Insert title here</title>
</head>
<body>
	<form action="doAdminAction.php?act=addAdmin" method ="post">
		<h3>添加管理员</h3>
		<table width="70%" border="1" bgcolor = "#ccc" cellspacing="0" cellpadding="5">
			<tr>
				<td align="center">管理员名称</td>
				<td>
				<input type="text" name="username" placeholder ="请输入管理员名称" />
				</td>
			</tr>
			<tr>
				<td align="center">管理员密码</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td align="center">管理员邮箱</td>
				<td><input type="text" name="email" placeholder ="请输入管理员邮箱" /></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" value="添加管理员" /></td>
			</tr>
			
		</table>

	</form>

</body>
</html>