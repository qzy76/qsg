<?php
$uid=$_COOKIE['ckuid'];
$upwd=$_POST['upwd'];
if($upwd==0){
	echo json_encode(0);
	}else{
require_once("../connect.php");
$sql="select COUNT( * ) as num from users where uid=$uid and upwd = '$upwd'";
$result=mysql_query($sql);
$isok = $result==true?"1":"0";
echo $isok;
}
?>