<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$title=$_POST['title'];
$bfile=$_FILES['file'];
$burl=$_POST['burl'];
$sort=$_POST['sort'];
require_once("../functions.php");
if($title==""){
	js_back("title不能为空！");
}
if($bfile['tmp_name']==""){
	js_back("请上传图片!");
}
if($burl==""){
	js_back("url不能为空！");
}
if($sort<0){
	js_back("排序必须为数字！");
}
require_once("../uploadfile.class.php");
$upload=new UploadFile();
$bpic=$upload->upload($bfile,"uploads/");
require_once("../connect.php");
$sql="insert into banner(bpic,bname,burl,bsort,bdate) values('$bpic','$title','$burl','$sort',now())";
$result=mysql_query($sql);
if($result){ js_go("添加成功！","index_bannerAdd.php");}
else{ js_back("添加失败！");}
?>