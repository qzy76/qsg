<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$aid=intval($_GET['aid']);
require_once("../connect.php");
require_once("../functions.php");
$sql="delete from activity where aid=$aid";
$result=mysql_query($sql);
if($result>0){
	$result=mysql_query($sql);
	js_go("删除成功！","activelist.php");
}
else{
	js_back("删除失败！");
}
?>