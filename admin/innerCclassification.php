<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$cconame=$_POST['cconame'];
$coid=$_POST['coid'];
$ckcosort=$_POST['ckcosort'];
require_once("../functions.php");
require_once("../connect.php");
if($cconame==""){
	js_back("分类不能为空！");
}
if($coid==""){
	js_back("出错！");
}
if($ckcosort<0){
	js_back("排序必须为数字！");
}
$sql="insert into cclassification(cconame,ccosort,ckcosort) values('$cconame','$coid','$ckcosort')";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","cclassificationlist.php");}
else{ js_back("添加失败！");}
?>