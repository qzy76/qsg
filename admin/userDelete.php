<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$aduid = $_COOKIE['ckadid'];
require_once("../connect.php");
require_once("../functions.php");
$sql_check="SELECT adsuper FROM admin where adid ='$aduid' and adsuper = '1'";
$result_check=mysql_query($sql_check);
$result_row=mysql_fetch_assoc($result_check);
if($result_row!=""){
	$uid=intval($_GET['uid']);
	$sql="delete from users where uid=$uid";
	$result=mysql_query($sql);
	$sql_cart="delete from cart where cuid=$uid";
	mysql_query($sql_cart);//购物车
	$sql_encrypted="delete from encrypted where euid=$uid";
	mysql_query($sql_encrypted);//密保
	$sql_orders="delete from orders where ouid=$uid";
	mysql_query($sql_orders);//订单
	if($result>0){
		$result=mysql_query($sql);
		js_go("删除成功！","user.php");
	}
	else{
		js_back("删除失败！");
	}
}else{
	js_back("您暂时没有删除用户权限！");
}
?>