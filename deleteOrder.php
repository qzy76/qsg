<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
require_once("connect.php");
$oid=$_POST['data'];
$uid=$_COOKIE['ckuid'];
$sql="delete from orders WHERE ouid = '$uid'and oid='$oid' and ostate='0'";
$result = mysql_query($sql);
if($result==false){
	echo '0';
}else{
	$sql1="delete from oitems WHERE ouuid = '$uid'and oiid='$oid'";
	$result1 = mysql_query($sql1);
	$isok = $resurlt1 == true?1:0;
	echo $isok;
}
?>