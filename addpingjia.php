<?php
header("Content-type: text/html; charset=utf-8");
require_once("islogin.php");
require_once("uploadfile.php");
require_once("connect.php");
require_once("functions.php");
$uid=$_COOKIE['ckuid'];
$etitle=$_POST['etitle'];//评价内容
$star=$_POST['star'];//评分数
$oid=$_POST['oid'];//评分数
$sql1="SELECT ostate FROM orders INNER JOIN oitems WHERE oid=$oid";
$result1=mysql_query($sql1);
$row1=mysql_fetch_assoc($result1);
if($row1['ostate']!=3){
	js_back("请勿重复评价！");
}
foreach($etitle as $pid=> $title){
	$st=$star[$pid];
	if($title==""){js_back("请填写评价！");}
	if($st==""){js_back("请选择星级评价！");}
}
$upload=new UploadFile();
foreach($etitle as $pid=> $title){
	$et=$etitle[$pid];
	$st=$star[$pid];
	$file=$_FILES['file'.$pid];//图片
	$bpic = $upload->upload($file,"uploads/");
	$sql2="insert into evaluation(etitle,epic,epid,euid,estar,edate) values('$et','$bpic','$pid','$uid','$st',now())";
	mysql_query($sql2);
}
$sql3="update orders set ostate=4 where oid=$oid";
$result3=mysql_query($sql3);
if($result3>0){
	js_go("评价成功！","orderlist.php");
}
else{
	js_back("评价失败!");
}
?>