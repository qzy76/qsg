<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$cccoid=intval($_GET['cccoid']);
$ccconame=$_POST['ccconame'];
$cckcosort=$_POST['cckcosort'];
if($ccconame==""){
	js_back("名称不能为空！");
}
if($cckcosort<0){
	js_back("排序必须为数字！");
}
$sql="update ccclassification set ccconame='$ccconame',cckcosort='$cckcosort' where cccoid=$cccoid";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("修改成功！","ccclassificationlist.php");}
else{ js_back("修改失败！");}
?>