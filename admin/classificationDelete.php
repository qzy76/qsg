<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$coid=intval($_GET['coid']);
$qsql="SELECT * FROM cclassification where ccosort =$coid";
$qresult=mysql_query($qsql);
$qrow=mysql_fetch_assoc($qresult);
//exit($qrow);
if($qrow==""){
	$sql="delete from classification where coid=$coid";
	$result=mysql_query($sql);
	if($result>0){
		$result=mysql_query($sql);
		js_go("删除成功！","classificationlist.php");
	}
	else{
		js_back("删除失败,请联系管理员！");
	}
}else{
	js_back("该分类下有商品，请清空后再删除！");
}
?>