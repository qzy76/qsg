<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$pid=intval($_GET['pid']);
require_once("../connect.php");
require_once("../functions.php");
require_once("../uploadfile.class.php");
$sql="delete from product where pid=$pid";
//exit($sql);
$result=mysql_query($sql);
if($result>0){
	$result=mysql_query($sql);
	js_go("删除成功！","productlist.php");
}
else{
	js_back("删除失败！");
}
?>