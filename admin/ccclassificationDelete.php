<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$cccoid=intval($_GET['cccoid']);
$qsql="SELECT * FROM product where pclassification =$cccoid";

$qresult=mysql_query($qsql);
$qrow=mysql_fetch_assoc($qresult);
if($qrow==""){
$sql="delete from ccclassification where cccoid=$cccoid";
$result=mysql_query($sql);
if($result>0){
	$result=mysql_query($sql);
	js_go("删除成功！","ccclassificationlist.php");
}
else{
	js_back("删除失败,请联系管理员！");
}}
else{
	js_back("该分类下有商品，请清空后再删除！");
}
?>