<?php

function addCate(){ 
	$arr = $_POST;
	if(insert("imooc_cate",$arr)){ 
		$mes = "分类添加成功！ <a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a><br>";
	}else{ 
		$mes = "分类添加失败！ <a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a><br>";
	}
	return $mes;
}

//根据id得到指定的信息
function getCateById($id){ 
	$sql = "select id,cName from imooc_cate where id ='{$id}'";
	return fetchOne($sql);

}

//修改分类
function editCate($id){ 
	$arr = $_POST;
	if(update("imooc_cate",$arr,"id={$id}")){ 
		$mes = "分类修改成功！ <a href='addCate.php'>重新修改</a>|<a href='listCate.php'>查看分类</a><br>";
	}else{ 
		$mes = "分类修改失败！ <a href='addCate.php'>重新修改</a>|<a href='listCate.php'>查看分类</a><br>";
	}
	return $mes;
}

//删除分类
function delCate($id){ 
	if(delete1("imooc_cate","id={$id}")){ 
		$mes = "删除成功! <br /><a href='listCate.php'>查看分类列表</a><a href='addCate.php'></a>";
	}else{ 
		$mes = "删除失败！<br /> <a href='listCate.php'>重新删除</a>";
	}
	return $mes;
}


// 得到所有分类
function getAllCate(){
	$sql = "select id,cName from imooc_cate";
	$rows = fetchAll($sql);
	return $rows;
}