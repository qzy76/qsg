<?php
$uid=$_POST['uid'];
$upwd=$_POST['upwd'];
if($upwd==0){
	echo '0';
}else{
	require_once("connect.php");
	$sql="update users set upwd='$upwd' where uid=$uid";
	$result=mysql_query($sql);
	$isok = $result==true?"1":"0";
	echo $isok;
}
?>