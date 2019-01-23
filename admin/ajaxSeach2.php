<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$coid1=$_GET['coid1'];
if($coid1==0){
	echo("该分类下没有商品");
}else{
require_once("../connect.php");
$Qsql="SELECT pid,pname,ppic,price,preferential,pinventory,phot,pnew,psale,ptuan,ccconame,pcheck FROM product INNER JOIN ccclassification ON pclassification = cccoid
INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort WHERE ccoid =$coid1";
$Qresult=mysql_query($Qsql);
$shuzhu2=array();
while($Qrow=mysql_fetch_assoc($Qresult)){
	$shuzhu2[] = $Qrow;
}
echo json_encode($shuzhu2);
}
?>