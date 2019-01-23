<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$uid=intval($_GET['uid']);
require_once("../connect.php");
require_once("../functions.php");
$sql="delete from admin where adid=$uid";
//exit($sql);
$result=mysql_query($sql);
if($result>0){
	$result=mysql_query($sql);
	js_go("删除成功！","index.php");
}
else{
	js_back("删除失败！");
}
?>