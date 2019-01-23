<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once ("connect.php");
require_once ("functions.php");
$uname=checkPost($_POST["uname"]);
$upwd=checkPost($_POST["upwd"]);
$sdate=$_POST["sdate"];
$checkno=$_POST['checkno'];
$page=checkPost($_POST["page"]);//看有没有传当前页信息，有的话返回当前页，没有的话返回首页
if($uname==""){
   js_back("用户名不能为空！");
}
if($upwd==""){
   js_back("密码不能为空！");
}
if($checkno!=$_SESSION['randcode']){
   js_back("验证码不正确！");
}
$selectsql="select uid from users where uname='$uname' and upwd=sha1('$upwd')";
$result=mysql_query($selectsql);
$row=mysql_fetch_row($result);
$uid=$row[0];
if($uid>0){
	if($sdate>0){
		setcookie("ckuname",$uname,time()+3600*24*$sdate);
		setcookie("ckuid",$uid,time()+3600*24*$sdate);
	}
	else{
		setcookie("ckuname",$uname);
		setcookie("ckuid",$uid);
	}
	if(preg_match("/[A-Za-z]/",$upwd)&& preg_match("/\d/",$upwd)){
			$sql1="update users set usecurity =1 where uid = $uid";//密码符合规则改为1
		}else{
			$sql1="update users set usecurity =0 where uid = $uid";//密码不符合规则改为空
		}
		if($page!=""){
			echo('<script language="javascript">location.href="'.$page.'";</script>');
		}else{
			echo('<script language="javascript">location.href="index.php";</script>');
		}
}else{
   js_back("登录失败：用户名或密码不对！");
}
?>