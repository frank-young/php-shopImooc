<?php 
/**
*连接数据库
*
*
**/

function connect(){ 
	$link = mysql_connect(DB_HOST,DB_USER,DB_PWD)or die("数据库连接失败Error：".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME) or die("指定数据库打开失败".mysql_errno().":".mysql_error());
	return $link;
}


/**
 * 完成记录插入的操作
 * @param  [type] $table
 * @param  [type] $array
 * @return       
 */
function insert($table,$array){
	$keys = join(",",array_keys($array));
	$vals = "'".join(" ',' ",array_values($array))."'";
	$sql = "insert {$table} ($keys) values ({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
 }


//updata imooc_admin set username="Young" where id=1;
 /*更新记录的操作
*@param string $table;
*@param array $array
*@param string $where
*@param return num
*/
 function update($table,$array,$where=null){
 	foreach ($array as $key => $val) {
 		if($str==null){
 			$sep ="";
 		}else{ 
 			$sep = ",";
 		}
 		$str .=$sep.$key."='".$val."'";
 	}
 		
 		$sql = "update {$table} set {$str} ".($where ==null?null:" where ".$where);//一定要有空格
 		$result = mysql_query($sql);
 		if($result){
 			return mysql_affected_rows();
 		}else{ 
 			return false;
 		}
 }
//记录删除记录

 function delete1($table,$where=null){ 
 	$where=$where==null?null:" where ".$where;
 	$sql = "delete from {$table} {$where}";
 	mysql_query($sql);
 	return mysql_affected_rows();

 }


 /*查询一条记录*/
 function fetchOne($sql,$result_type=MYSQL_ASSOC){ 
 	$result = mysql_query($sql);
 	@$row = mysql_fetch_array($result,$result_type);
 	return $row;
 }

//得到结果集中所有的记录
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	 $result = mysql_query($sql);
	 while(@$row = mysql_fetch_array($result,$result_type)){ 
	 	$rows[] = $row;
	 }
	 return $rows;

}
//得到结果集中的记录条数
function getResultNum($sql){ 
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}
/**
 * 得到上一步插入记录id号
 * @return [type]
 */
function getInsertId(){
	return mysql_insert_id();
}