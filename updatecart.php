<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
$cnums=$_POST["cnums"];
require_once("connect.php");
foreach($cnums as $k=>$value){
	$num=intval($value);
	if($num>0){$sql="update cart set cnum=$value where cid=$k";}
	else{$sql="delete from cart where cid=$k";}
	mysql_query($sql);
}
header("location:cart.php");
?>