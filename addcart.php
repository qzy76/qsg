<?php
header("Content-type: text/html; charset=utf-8");
require_once("functions.php");
require_once("islogin.php");
$uid=$_COOKIE['ckuid'];
$cpid=intval($_GET['pid']);
$num=intval($_GET['num']);
require_once("connect.php");
$selsql="select cid from cart where cpid=$cpid and cuid=$uid";
$selresult=mysql_query($selsql);
$selrow=mysql_fetch_assoc($selresult);
if($selrow["cid"]>0){
	$upsql="update cart set cnum=cnum+$num where cid=".$selrow[cid];
	$result=mysql_query($upsql);
}else{
	$sql="insert into cart(cpid,cnum,cuid) values($cpid,$num,$uid)";
	$result=mysql_query($sql);
}
if($result){
	header('location: '.$_SERVER['HTTP_REFERER']);
}
else{js_back("添加失败！");}
?>