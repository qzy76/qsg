<?php
$uid = $_POST['uid'];
$q1 = $_POST['a1'];
$q2 = $_POST['a2'];
$q3 = $_POST['a3'];
require_once ("connect.php");
if ($uid == "" || $q1 == "" || $q2 == "" || $q3 == "") {
	echo '404';//缺少参数
}else{
	$checksql = "select euid from encrypted where answer1='$q1' and answer2='$q2' and answer3='$q3' and euid='$uid'";
	// echo $checksql;
	$checkresult = mysql_query($checksql);
	$checkrow=mysql_fetch_assoc($checkresult);
	$uid=$checkrow['euid'];
	if ($uid!="") {//不等于空
		echo '1';
	} else {
		echo '0';//错误
	}
}
?>