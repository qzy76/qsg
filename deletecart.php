<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
require_once("connect.php");
$pid=intval($_GET['pid']);
$pag=$_GET['pag'];
$pag=mysql_real_escape_string($pag);
$uid=$_COOKIE['ckuid'];
$sql="delete from cart where cpid=$pid and cuid=$uid";
mysql_query($sql);
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

?>