<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$cid=$_POST['cid'];//上级排序
$coname=$_POST['ccconame'];//名称
$ckccosort=$_POST['ckccosort'];//排序
require_once("../functions.php");
	require_once("../connect.php");
if($coname==""){
	js_back("分类不能为空！");
}
if($cid==""){
	js_back("小分类不能为空，请联系管理员处理！");
}

if($sort<0){
	js_back("排序必须为数字！");
}
$sql="insert into ccclassification(ccconame,cccosort,cckcosort) values('$coname','$cid','$ckccosort')";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","ccclassificationlist.php");}
else{ js_back("添加失败！");}
?>