<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$cBid=$_POST['cBid'];
$cid=$_POST['cid'];
$cBcolor=$_POST['cBcolor'];
$cBtitle1=$_POST['cBtitle1'];
$cBtitle2=$_POST['cBtitle2'];
$bpic=$_POST['cBpic'];
$bfile=$_FILES['file'];
$cBsort=$_POST['cBsort'];
if($cBid==""){js_back("ID号为空，请联系管理员！");}
if($cid==""){js_back("请选择标题！");}
if($cBcolor==""){js_back("颜色值不能为空！");}
if($cBtitle1==""){js_back("文本1不能为空！");}
if($cBtitle2==""){js_back("文本2不能为空！");}
if($cBsort==""){js_back("请添加排序值！");}
if($bfile['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($bfile,"uploads/");//上传新图片
}
$sql="update classblock set cBcoid='$cid',cBcolor='$cBcolor',cBpic='$bpic',cBtitle1='$cBtitle1',cBtitle2='$cBtitle2',cBsort='$cBsort' where cBid=$cBid";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("修改成功！","index_product.php");}
else{ js_back("修改失败！");}
?>