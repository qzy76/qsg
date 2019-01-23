<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
$uid=$_COOKIE['ckuid'];
$oname=$_POST["oname"];
$oaddress=$_POST["oaddress"];
$ophone=$_POST["ophone"];
require_once("islogin.php");
require_once("functions.php");
if($oname==""){js_back("姓名不能为空！");}
if($oaddress==""){js_back("地址不能为空！");}
if($ophone==""){js_back("手机号码不能为空！");}
require_once("connect.php");
$r=rand(1000,9999);//随机生成4位数
$ordername=date('YmdHis').$r;//生成订单号
$sql1="insert into orders(onum,oname,oaddress,ophone,odate,ostate,ouid) values('$ordername','$oname','$oaddress','$ophone',now(),'0','$uid')";
$result1=mysql_query($sql1);//添加订单基本信息
if($result1){//为真时执行
	$oid=mysql_insert_id();//返回添加的订单的ID
	$sqlcart="select cnum,price,cpid,preferential from cart inner join product on cpid=pid where cuid=$uid";//查用户购物车中的商品
	$cartresult = mysql_query($sqlcart);
	$total = "";
	while($crow=mysql_fetch_assoc($cartresult)){//循环添加进订单
		$opid=$crow['cpid'];
		$onum=$crow['cnum'];
		$opprice=($crow['price']-$crow['preferential'])*$onum;
		$total+=$opprice;
		$oisql="insert into oitems(oiid,ouuid,opid,onum,opprice)values($oid,$uid,$opid,$onum,$opprice)";
		mysql_query($oisql);
	}
	$uqsql="update orders set ototal=$total where oid=$oid";
	mysql_query($uqsql);
	$delsql="delete from cart where cuid=$uid";//删除购物车中的商品
	mysql_query($delsql);
	header("location:orderlist.php");
}
else{js_back("添加订单基本信息失败！");}
?>