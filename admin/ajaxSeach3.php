<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$coid2=$_GET['coid2'];
if($coid2==0){
	echo("该分类下没有商品");
}else{
require_once("../connect.php");
$Qwsql="SELECT pid,pname,ppic,price,preferential,pinventory,phot,pnew,psale,ptuan,ccconame,pcheck FROM product INNER JOIN ccclassification ON pclassification = cccoid
INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort WHERE cccoid =$coid2";
$Qwresult=mysql_query($Qwsql);
$shuzhu3=array();
while($Qwrow=mysql_fetch_assoc($Qwresult)){
	$shuzhu3[] = $Qwrow;
}
echo json_encode($shuzhu3);
}
?>