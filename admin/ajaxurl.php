<?php
$aurl=$_POST['aurl'];
require_once("../connect.php");
$sql="select paid from activepage where aid = '$aurl'";
$result=mysql_query($sql);
$row = mysql_fetch_assoc($result);
$paid = $row['paid'];
if($paid!=""){
	echo "0";
}else{
	echo "1";
}
?>