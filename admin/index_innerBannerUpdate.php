<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$bid=$_POST['bid'];
$title=$_POST['title'];
$bpic=$_POST['bpic'];
$bfile=$_FILES['file'];
$burl=$_POST['burl'];
$sort=$_POST['sort'];
if($title==""){
	js_back("title不能为空！");
}

if($burl==""){
	js_back("url不能为空！");
}
if($sort<0){
	js_back("排序必须为数字！");
}
if($bfile['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($bfile,"uploads/");//上传新图片
}
$sql="update banner set bpic='$bpic',bname='$title',burl='$burl',bsort='$sort' where bid=$bid";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("修改成功！","index_banner.php");}
else{ js_back("修改失败！");}
?>