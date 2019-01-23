<?php
$ccosort1=$_GET['ccosort1'];
if($ccosort1==0){
	echo "0";
	}else{
require_once("../connect.php");
$sql="select * from cclassification where ccosort=$ccosort1";
$result=mysql_query($sql);
$shuzhu=array();
while($row=mysql_fetch_assoc($result)){	
$shuzhu[$row["ccoid"]]=$row["cconame"];
}
echo json_encode($shuzhu);
}
?>