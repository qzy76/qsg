<?php
$uid=$_COOKIE['ckuid'];
$email=$_POST['email'];
if($email==0){
	echo json_encode(0);
	}else{
require_once("../connect.php");
$sql="update users set uemail='$email' where uid=$uid";
$result=mysql_query($sql);
$isok = $result==true?"1":"0";
echo $isok;
}
?>