<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$ccoid=intval($_GET['ccoid']);
$qsql="SELECT * FROM ccclassification where cccosort =$ccoid";
$qresult=mysql_query($qsql);
$qrow=mysql_fetch_assoc($qresult);
//exit($qrow);
if($qrow==""){
	$sql="delete from cclassification where ccoid=$ccoid";
	$result=mysql_query($sql);
	if($result>0){
		$result=mysql_query($sql);
		js_go("删除成功！","cclassificationlist.php");
	}
	else{
		js_back("删除失败,请联系管理员！");
	}
}else{
	js_back("该分类下有商品，请清空后再删除！");
}
?>