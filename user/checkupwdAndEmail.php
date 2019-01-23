<?php
$uid=$_COOKIE['ckuid'];
$upwd=$_POST['upwd'];
$uemail=$_POST['uemail'];
require_once("../connect.php");
$sql="select uid from users where uid=$uid and upwd = '$upwd' and uemail = '$uemail'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
if($row['uid']>0){
	echo '1';
}else{
	echo '0';
};
?>