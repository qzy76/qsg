<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once ("../connect.php");
require_once ("../functions.php");
$adname=checkPost($_POST["adname"]);
$adpwd=checkPost($_POST["adpwd"]);
$sdate=$_POST["sdate"];
$adcheckno=$_POST['adcheckno'];
if($adname==""){
   js_back("用户名不能为空！");
}
if($adpwd==""){
   js_back("密码不能为空！");
}
if($adcheckno!=$_SESSION['randcode']){
   js_back("验证码不正确！");
}
$adpwd = sha1($adpwd);
$sql="SELECT adid FROM admin WHERE adname = '$adname' AND adpwd = '$adpwd'";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
$adid=$row[0];  
if($adid>0){
	if($sdate>0){
		setcookie("ckadname",$adname,time()+3600*24*$sdate);
		setcookie("ckadid",$adid,time()+3600*24*$sdate);
	}
	else{
		setcookie("ckadname",$adname);
		setcookie("ckadid",$adid);
	}
	echo('<script language="javascript">location.href="index.php";</script>');
}else{
   js_back("登录失败：用户名或密码不对！");
}
?>