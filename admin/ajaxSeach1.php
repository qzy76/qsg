<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$coid=$_GET['coid'];
if($coid==0){
	echo("该分类下没有商品");
}else{
require_once("../connect.php");
$sql="SELECT pid,pname,ppic,price,preferential,pinventory,phot,pnew,psale,ptuan,ccconame,pcheck FROM product INNER JOIN ccclassification ON pclassification = cccoid
INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort WHERE coid =$coid";
$result=mysql_query($sql);
$shuzhu1=array();
while($row=mysql_fetch_assoc($result)){
	$shuzhu1[] = $row;
}
echo json_encode($shuzhu1);
}
?>