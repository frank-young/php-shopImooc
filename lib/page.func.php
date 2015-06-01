<?php
/*
require_once '../include.php';
$sql = "select * from imooc_admin";//获取结果集；
$totalRows = getResultNum($sql);
//echo $totalRows;
$pageSize = 2;//每页显示两条
$totalPage = ceil($totalRows/$pageSize);//得到总页码数
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page == null|| !is_numeric($page)){ 
	$page=1;
}
if($page>=$totalPage){ 
	$page = $totalPage;
}

$offset = ($page-1)*$pageSize;
$sql = "select * from imooc_admin limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
foreach ($rows as $row) {
	echo "编号：".$row['id'],"<br />";
	echo "管理员的名称：".$row['username'],"<hr />";
}
*/

function showPage($page,$totalPage,$sep="&nbsp;"){
$index = ($page ==1)?"首页":"<a href='{$url}?page=1'>首页</a>";
$last = ($page ==$totalPage)?"尾页":"<a href='{$url}?page={$totalPage}'>尾页</a>";
$prev = ($page ==1)?"上一页":"<a href='{$url}?page=".($page-1)."'>上一页</a>";
$next = ($page ==$totalPage)?"下一页":"<a href='{$url}?page=".($page+1)."'>下一页</a>";
$str = "总共{$totalPage}页/当前是第{$page}页";
$offset = ($page-1)*$pageSize;
$url = $_SERVER['PHP_SELF'];
for($i=1;$i<=$totalPage;$i++){ 
	//当前页无链接
	if($page ==$i){
		$p.="[{$i}]";
	 }else{ 
	 	$p.="<a href='{$url}?page={$i}'>[{$i}]</a>";
	 }

}
	$pageStr = $str."<br>".$index.$sep.$prev.$sep.$p.$sep.$next.$sep.$last;
	return $pageStr;

}
