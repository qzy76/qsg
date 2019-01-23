<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../functions.php");
require_once("../connect.php");
$uname=$_POST['uname'];
$upwd=$_POST['upwd'];
$uphone=$_POST['uphone'];
$upwd1=$_POST['upwd1'];
$uemail=$_POST['uemail'];
if($uname==""){
	js_back("名称不能为空！");
}
if($upwd==""){
	js_back("密码不能为空！");
}
if($upwd!=$upwd1){
	js_back("两次密码不一致，请重新输入！");
}
if($uemail!=""){
	$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
	if(!preg_match($pattern,$uemail)){
	   js_back("邮箱格式错误！");
	}
}
$check="/(?=^.*?[a-z])(?=^.*?[A-Z])(?=^.*?\d)^(.{6,17})$/i";
if(preg_match($check,$upwd)){
	$sql="insert into users(uname,upwd,uemail,uphone,usecurity,udate) values('$uname',sha1('$upwd'),'$uemail','$uphone','1',now())";
}else{
	$sql="insert into users(uname,upwd,uemail,uphone,udate) values('$uname',sha1('$upwd'),'$uemail','$uphone',now())";
}

//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","user.php");}
else{ js_back("添加失败！");}
?>