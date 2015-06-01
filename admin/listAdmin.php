<?php 
require_once '../include.php';
$sql = "select * from imooc_admin";//获取结果集；
$totalRows = getResultNum($sql);//获取中结果集的数量
$pageSize = 2;//每个页面的条数
$totalPage = ceil($totalRows/$pageSize);//总页码，用ceil取整，进一取整
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page == null|| !is_numeric($page)){ //转换不是1，或者是空，或者不是整形的$page;
    $page=1;
}
if($page>=$totalPage){ 
    $page = $totalPage;
}
$offset = ($page-1)*$pageSize;
$sql = "select id,username,email from imooc_admin limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
if(!$rows){ 
    alertMes("sorry，没有管理员，请添加","addAdmin.php");
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
                    <input type="button" onclick="addAdmin()" value="添&nbsp;&nbsp;加" class="add"></div>
                <div class="fr">
                    <div class="text">
                        <span>管理员名称：</span>
                        <div class="bui_select">
                            <select name="" id="" class="select">
                                <option value="1">测试内容</option>
                                <option value="1">测试内容</option>
                                <option value="1">测试内容</option>
                            </select>
                        </div>
                    </div>
                    <div class="text">
                        <span>上架时间：</span>
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
                        <input type="text" value="" class="search"></div>
                </div>
            </div>
            <!--表格-->
            <table class="table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="15%">编号</th>
                        <th width="25%">管理员名称</th>
                        <th width="35%">管理员邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i=1; foreach ($rows as $row):
                                
                    ?>

                    <tr>
                        <!--这里的id和for里面的c1 需要循环出来-->
                        <td>
                            <input type="checkbox" id="c1" class="check">
                            <label for="c1" class="label">
                                <?php echo $i;?></label>
                        </td>
                        <td>
                            <?php echo $row['username'];?></td>
                        <td>
                            <?php echo $row['email'];?></td>
                        <td align="center">
                            <input type="button" value="修改" onclick = "editAdmin(<?php echo $row['id'];?>
                            )" class="btn">
                            <input type="button" onclick="delAdmin(<?php echo $row['id'];?>)" value="删除" class="btn"></td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    <?php if($rows>
                    $pageSize): ?>
                    <tr>
                        <td class="showPage" colspan="4">
                            <?php echo showPage($page,$totalPage); ?></td>
                    </tr>
                    <?php endif; ?></tbody>
            </table>
        </div>
    </div>
</body>

    <script>
function addAdmin(){ 
    window.location="addAdmin.php";
}
function editAdmin(id){ 
    window.location="editAdmin.php?id="+id;
}
function delAdmin(id){ 
    if(window.confirm("你确定要删除吗？")){
        window.location = "doAdminAction.php?act=delAdmin&id="+id;
    }
}
</script>
</html>