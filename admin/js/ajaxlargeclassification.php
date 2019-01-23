<?php
$optionval=$_GET['optionval'];
if($optionval==0){
	echo "0";
	}else{
require_once("../connect.php");
$sql="select * from  smallclassification where slid=$optionval";
$result=mysql_query($sql);
$shuzhu=array();
while($row=mysql_fetch_assoc($result)){	
$shuzhu[$row["sid"]]=$row["sname"];
}
echo json_encode($shuzhu);
}
?>