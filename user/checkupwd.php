<?php
$uid=$_COOKIE['ckuid'];
$upwd=$_GET['upwd'];
if($upwd==0){
	echo "0";
	}else{
require_once("../connect.php");
$sql="select COUNT( * ) as num from users where uid=$uid and upwd = '$upwd'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$isok = $row['num'];
echo json_encode($isok);
}
?>