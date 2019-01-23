<?php
	require_once("connect.php");
	$uname=$_POST["uname"];
	$check_sql="select uid from users where uname = '$uname'";
	$check_result = mysql_query($check_sql);
	$check_row = mysql_fetch_assoc($check_result);
	if($check_row['uid']!=""){
		echo '1';
	}else{
		echo '0';
	}
?>