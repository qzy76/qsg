<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once ("connect.php");
require_once ("functions.php");
$uname=checkPost($_POST["uname"]);
$upwd=checkPost($_POST["upwd"]);
$checkno=$_POST['checkno'];
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
		setcookie("ckuname",$uname);
		setcookie("ckuid",$uid);
		if(preg_match("/[A-Za-z]/",$upwd)&& preg_match("/\d/",$upwd)){
			$sql1="update users set usecurity =1 where uid = $uid";//密码符合规则改为1

		}else{
			$sql1="update users set usecurity =0 where uid = $uid";//密码不符合规则改为空
		}
		mysql_query($sql1);
		echo('<script language="javascript">location.href="user/userCenter.php";</script>');
		
}else{
   js_back("登录失败：用户名或密码不对！");
}
?>