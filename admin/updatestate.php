<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$oid=$_GET['oid'];
$ostate=$_GET['ostate'];
require_once("../connect.php");
$sql="update orders set ostate=$ostate where oid=$oid";
$result=mysql_query($sql);
if($result){header("location:orderlist.php");}
else{echo("更新状态出错！");}
?>