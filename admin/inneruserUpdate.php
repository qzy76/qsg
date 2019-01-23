<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
$uid=intval($_GET['uid']);
$uname=$_POST['uname'];
$uemail=$_POST['uemail'];
$uphone=$_POST['uphone'];
if($uid==""){
	js_back("ID号为空，请联系管理员！");
}
if($uname==""){
	js_back("用户名不能为空！");
}
$sql="update users set uname='$uname',upwd=sha1('88888888'),uemail='$uemail',uphone='$uphone' where uid=$uid";
$result=mysql_query($sql);
if($result){ js_go("修改成功！","user.php");}
else{ js_back("修改失败！");}
?>