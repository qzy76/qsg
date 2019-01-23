<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$cBcoid=$_POST['cBcoid'];
$cBcolor=$_POST['cBcolor'];
$cBtitle1=$_POST['cBtitle1'];
$cBtitle2=$_POST['cBtitle2'];
$file=$_FILES['file'];
$cBsort=$_POST['cBsort'];
if($cBcoid==""){js_back("操作失败，请重试一遍，如仍然失败，请联系技术人员！");}
if($file==""){js_back("图片不能为空！");}
if($cBcolor==""){js_back("色调颜色不能为空！");}
if($cBtitle1==""){js_back("文本1不能为空！");}
if($cBtitle2==""){js_back("文本2不能为空！");}
if($cBsort==""){js_back("排序不能为空！");}
$upload=new UploadFile();
$bpic=$upload->upload($file,"uploads/");
$sql="insert into classblock(cBcoid,cBcolor,cBtitle1,cBtitle2,cBpic,cBsort) values
('$cBcoid','$cBcolor','$cBtitle1','$cBtitle2','$bpic','$cBsort')";
$result=mysql_query($sql);
if($result){ js_go("添加成功！","index_product.php");}
else{ js_back("添加失败！");}
?>