<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$ccoid=intval($_GET['ccoid']);
$cconame=$_POST['cconame'];
$ccosort=$_POST['ccosort'];
$ckcosort=$_POST['ckcosort'];
if($cconame==""){
	js_back("名称不能为空！");
}
if($ckcosort<0){
	js_back("排序必须为数字！");
}
$sql="update cclassification set cconame='$cconame',ckcosort='$ckcosort' where ccoid=$ccoid";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("修改成功！","cclassificationlist.php");}
else{ js_back("修改失败！");}
?>