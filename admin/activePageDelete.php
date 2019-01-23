<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$paid=intval($_GET['paid']);
require_once("../connect.php");
require_once("../functions.php");
$sql="delete from activepage where paid=$paid";
$result=mysql_query($sql);
if($result>0){
	$result=mysql_query($sql);
	js_go("删除成功！","activePageList.php");
}
else{
	js_back("删除失败！");
}
?>