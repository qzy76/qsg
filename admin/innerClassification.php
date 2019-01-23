<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$coname=$_POST['coname'];
$cosort=$_POST['cosort'];
require_once("../functions.php");
	require_once("../connect.php");
if($coname==""){
	js_back("分类不能为空！");
}
if($sort<0){
	js_back("排序必须为数字！");
}
$sql="insert into classification(coname,cosort) values('$coname','$cosort')";
$result=mysql_query($sql);
if($result){ js_go("添加成功！","index_bannerAdd.php");}
else{ js_back("添加失败！");}
?>