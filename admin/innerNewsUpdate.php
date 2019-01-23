<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$nid=$_POST['nid'];
if($nid==""){
	js_back("请刷新重试！");
}
$nname=$_POST['nname'];
$file=$_FILES['file'];
$bpic=$_POST['ppic'];
$nsort=$_POST['nsort'];
$ncontent=$_POST['pcontent'];
if($nname==""){js_back("名称不能为空！");}
if($file==""){js_back("图片不能为空！");}
if($ncontent==""){js_back("内容不能为空！");}
if($nsort==""){js_back("排序不能为空！");}
if($file['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($file,"uploads/");//上传新图片
}
$sql="update news set nname='$nname',npic='$bpic',nsort='$nsort',ncontent='$ncontent' where nid=$nid";
$result=mysql_query($sql);
if($result){ js_go("修改成功！","newslist.php");}
else{ js_back("添加失败！");}
?>