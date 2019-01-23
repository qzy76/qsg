<?php
$page=$_GET["page"];//看有没有传当前页信息，有的话返回当前页，没有的话返回首页
setcookie("ckuid");
setcookie("ckuname");
header("location:index.php");
if(strpos($page,'user/') !== false||strpos($file,'order.p') !== false||strpos($file,'cart.p') !== false||strpos($file,'orderlist.p') !== false){
	$page="index.php";
}
if($page!=""){
	header("location:".$page);
}else{
	header("location:index.php");
}
?>