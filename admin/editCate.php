<?php
require_once '../include.php';
$id = $_REQUEST['id'];
$row = getCateById($id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>修改分类</title>
</head>
<body>
	<form action="doAdminAction.php?act=editCate&id=<?php echo $id; ?>" method ="post">
		<h3>修改分类</h3>
		<table width="70%" border="1" bgcolor = "#ccc" cellspacing="0" cellpadding="5">
			<tr>
				<td align="center">分类名称</td>
				<td><input type="text" name="Cname" placeholder ="<?php echo $row['cName']; ?>" /></td>
			</tr>
			
			<tr>
				
				<td colspan="2"><input type="submit" value="修改分类" /></td>
			</tr>
			
		</table>

	</form>

</body>
</html>