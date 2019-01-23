<?php
session_start();
header("Content-type: text/html; charset=utf-8");
require_once("connect.php");
require_once("functions.php");
$checkno=$_POST['checkno'];
if($checkno!=$_SESSION['randcode']){
   js_back("验证码不正确！");
}
$uname=$_POST["uname"];
if($uname==""){
   js_back("用户名不能为空！");
}
$check_sql="select uid from users where uname = '$uname'";
$check_result = mysql_query($check_sql);
$check_row = mysql_fetch_assoc($check_result);
if($check_row['uid']){
	js_back("用户名已被注册，请修改用户名！");
}
if(strlen($uname)<3||strlen($uname)>16){
   js_back("用户名长度必须为3~16!");
}
$upwd=$_POST["upwd"];
if($upwd==""){
   js_back("密码不能为空！");
}
if(strlen($upwd)<6){
   js_back("密码长度不能小于6位！");
}
if(strlen($upwd)>16){
   js_back("密码长度不能大于16位！");
}
$Rupwd=$_POST["Rupwd"];
if($upwd!=$Rupwd){
   js_back("密码不一致，请重新输入！");
}
if(preg_match("/[A-z]/",$upwd)&& preg_match("/\d/",$upwd)){
	$insertsql="insert into users(uname,upwd,usecurity)values('$uname',sha1('$upwd'),'1')";//密码符合规则改为1
}else{
	$insertsql="insert into users(uname,upwd)values('$uname',sha1('$upwd'))";//密码不符合规则改为空
}

$result=mysql_query($insertsql);
if($result){
	$uid = mysql_insert_id();
	$select_sql = "select uname from users where uid = $uid";
	$select_result = mysql_query($select_sql);
	$select_row = mysql_fetch_assoc($select_result);
	setcookie("ckuname",$select_row['uname']);
	setcookie("ckuid",$uid);
	js_go("注册成功！","index.php");
}
else{
	js_back("注册失败！");
}
?>