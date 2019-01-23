<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../functions.php");
require_once("../connect.php");
$question=$_POST['question'];
if($question==""){
	js_back("名称不能为空！");
}
$sql="insert into equestion(qtitle) values('$question')";
$result=mysql_query($sql);
if($result){ js_go("添加成功！","encrypted.php");}
else{ js_back("添加失败！");}
?>