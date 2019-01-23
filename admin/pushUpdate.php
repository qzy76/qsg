<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$pid=intval($_GET['pid']);
$pname=$_POST['pname'];
$bpic=$_POST['bpic'];
$bfile=$_FILES['file'];
$bpic2=$_POST['ppic2'];
$bfile2=$_FILES['file2'];
$bpic3=$_POST['ppic3'];
$bfile3=$_FILES['file3'];
$bpic4=$_POST['ppic4'];
$bfile4=$_FILES['file4'];
$bpic5=$_POST['ppic5'];
$bfile5=$_FILES['file5'];
$price=$_POST['price'];
$pre=$_POST['pre'];
$pinventory=$_POST['pinventory'];
$pcontent=$_POST['pcontent'];
$psort=$_POST['psort'];
if($pname==""){
	js_back("名称不能为空！");
}
if($price==""){
	js_back("价格不能为空！");
}
if($price<0){
	js_back("价格不能为负！");
}
if($pre<0){
	js_back("优惠金额不能为负！");
}
if($pinventory<0){
	js_back("库存量不能为负！");
}
if($pre>$price){
	js_back("优惠金额不能大于价格！");
}
if($pcontent=""){
	js_back("介绍不能为空！");
}
if($psort<0){
	js_back("排序必须为数字！");
}
if($bfile['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($bfile,"uploads/");//上传新图片
}//图1
if($bfile2['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic2,"uploads/");//先删除旧图片
	$bpic2=$upload->upload($bfile2,"uploads/");//上传新图片
}//图二
if($bfile3['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic3,"uploads/");//先删除旧图片
	$bpic3=$upload->upload($bfile3,"uploads/");//上传新图片
}//图三
if($bfile4['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic4,"uploads/");//先删除旧图片
	$bpic4=$upload->upload($bfile4,"uploads/");//上传新图片
}//图四
if($bfile5['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic5,"uploads/");//先删除旧图片
	$bpic5=$upload->upload($bfile5,"uploads/");//上传新图片
}//图五
$sql="update product set pname='$pname',ppic='$bpic',ppic2='$bpic2',ppic3='$bpic3',ppic4='$bpic4',ppic5='$bpic5',pinventory='$pinventory',price='$price',pcontent='$pcontent',preferential='$pre',psort='$psort' where pid=$pid";
//exit($sql);
$result=mysql_query($sql);
?>