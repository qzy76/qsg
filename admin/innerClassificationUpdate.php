<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$coid=intval($_GET['coid']);
$coname=$_POST['coname'];
$cosort=$_POST['cosort'];
if($coname==""){
	js_back("名称不能为空！");
}
if($psort<0){
	js_back("排序必须为数字！");
}
$sql="update classification set coname='$coname',cosort='$cosort' where coid=$coid";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("修改成功！","index_banner.php");}
else{ js_back("修改失败！");}
?>