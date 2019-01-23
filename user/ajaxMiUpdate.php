<?php
$uid = $_COOKIE['ckuid'];
$w1 = $_POST['w1'];
$w2 = $_POST['w2'];
$w3 = $_POST['w3'];
$q1 = $_POST['d1'];
$q2 = $_POST['d2'];
$q3 = $_POST['d3'];
$type = $_POST['type'];
require_once ("../connect.php");
$sql = "SELECT euid FROM encrypted WHERE euid ='$uid'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
if ($row['euid'] != "") {//设置了的
	if ($q1 == "" || $q2 == "" || $q3 == "") {
		echo json_encode(0);
	}
	if($type==""){//查询的
		$checksql = "select euid from encrypted where answer1='$q1' and answer2='$q2' and answer3='$q3' and euid=$uid";
		$checkresult = mysql_query($checksql);
		$checkrow=mysql_fetch_assoc($checkresult);
		$uid=$checkrow['euid'];
		if ($uid!="") {//不等于空
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}else{//修改的
		if ($w1 == "" || $w2 == "" || $w3 == "" || $q1 == "" || $q2 == "" || $q3 == "") {
			echo json_encode(0);
		}
		$update_sql="update encrypted set questions1='$w1',questions2='$w2',questions3='$w3',answer1='$q1',answer2='$q2',answer3='$q3' where euid=$uid";
		$update_result=mysql_query($update_sql);
		if($update_result){echo json_encode(1);}
		else{ echo json_encode(0);}
	}
	
} else {//未设置的
	if ($w1 == "" || $w2 == "" || $w3 == "" || $q1 == "" || $q2 == "" || $q3 == "") {
		echo json_encode(0);
	}
	$insertsql = "insert into encrypted(euid,questions1,questions2,questions3,answer1,answer2,answer3)values('$uid','$w1','$w2','$w3','$q1','$q2','$q3')";
	$updateresult = mysql_query($insertsql);
	if ($updateresult) {
		echo json_encode(1);
	} else {
		echo json_encode(0);
	}
}
?>