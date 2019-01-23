<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
$oid=mysql_escape_string($_GET['oid']);
require_once("connect.php");
$uid=$_COOKIE['ckuid'];
$sql="update orders set ostate=3 where oid=$oid and ouid=$uid";
$result = mysql_query($sql);
if($result){header("location:orderlist.php");}
?>