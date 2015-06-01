<?php 
require_once '../include.php';
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql = "select * from imooc_cate";
$totalRows = getResultNum($sql);
$pageSize = 2;
$totalPage = ceil($totalRows/$pageSize);
if($page<1||$page == null|| !is_numeric($page)){ 
    $page=1;
}
if($page>=$totalPage){ 
    $page = $totalPage;
}
$offset = ($page-1)*$pageSize;
$sql = "select id,cName from imooc_cate limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
if(!$rows){ 
    alertMes("sorry，没有分类，请添加","addCate.php");
    exit;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<style type="text/css">
	input[type="submit"]{ cursor: pointer;}
	input[type="button"]{ cursor: pointer;}
	.showPage a{ color: #666;display: inline-block;}
	.showPage a:link{ color: skyblue;text-decoration: none;}
	.showPage a:visited{ color: skyblue;text-decoration: none;}
	.showPage a:hover{ color: deepskyblue;text-decoration: none;}
</style>
</head>

<body>
  
            <!--右侧内容-->
            <div class="cont">
              
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" onclick="addCate()" value="添&nbsp;&nbsp;加" class="add">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>分类名称：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select">
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>时间：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select">
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search">
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">分类名称</th>
                                
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>

                        	<?php $i=1; foreach ($rows as $row):
                        		
                        	 ?>

                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $i;?></label></td>
                                <td><?php echo $row['cName'];?></td>
                                
                                <td align="center"><input type="button" value="修改" onclick = "editCate(<?php echo $row['id'];?>)" class="btn">
                                <input type="button" onclick = "delCate(<?php echo $row['id'];?>)" value="删除" class="btn"></td>
                            </tr>
                          <?php $i++; endforeach; ?>
                          <?php if($rows>$pageSize): ?>
	                          <tr> 
	                          	<td class="showPage" colspan="4"><?php echo showPage($page,$totalPage); ?></td>
	                          </tr>
                      		<?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

<script>
function addCate(){ 
	window.location="addCate.php";
}
function editCate(id){ 
	window.location="editCate.php?id="+id;
}
function delCate(id){ 
	if(window.confirm("你确定要删除吗？")){
		window.location = "doAdminAction.php?act=delCate&id="+id;
	}
}
</script>
</html>