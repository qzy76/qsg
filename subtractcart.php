<?php
header("Content-type: text/html; charset=utf-8");
require_once("functions.php");
require_once("islogin.php");
$uid=$_COOKIE['ckuid'];
$cpid=intval($_GET['pid']);
$num=intval($_GET['num']);
$pag=$_GET['pag'];
$pag=checkPost($pag);
require_once("connect.php");
$selsql="select cid from cart where cpid=$cpid and cuid=$uid";
$selresult=mysql_query($selsql);
$selrow=mysql_fetch_assoc($selresult);
$ssql="select cnum from cart where cpid=$cpid and cuid=$uid";
$sresult=mysql_query($ssql);
$srow=mysql_fetch_assoc($sresult);
if($srow["cnum"]>1){
	$upsql="update cart set cnum=cnum-$num where cid=".$selrow[cid];
	$result=mysql_query($upsql);
}else{
//	js_back("商品数量不能小于1！");
	return false;
}
if($result){
	switch ($pag) {
	case 'home':
		header('location:index.php');
		break;
	case 'cart':
		header('location:cart.php');
		break;
	default:
		header('location:index.php');
		break;
}
	
}
?>