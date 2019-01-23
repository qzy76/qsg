<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$cccosort2=$_GET['cccosort2'];
if($cccosort2==0){
	echo "0";
	}else{
require_once("../connect.php");
$sql="select * from ccclassification where cccosort=$cccosort2";
$result=mysql_query($sql);
$shuzhu1=array();
while($row=mysql_fetch_assoc($result)){	
$shuzhu1[$row["cccoid"]]=$row["ccconame"];
}
echo json_encode($shuzhu1);
}
?>