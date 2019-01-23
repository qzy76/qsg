<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$aname=$_POST['aname'];
$bpic=$_POST['apic'];
$aid=$_POST['aid'];
$file=$_FILES['file'];
$asort=$_POST['asort'];
$aurl=$_POST['aurl'];
if($aid==""){js_back("请刷新重试！");}
if($aname==""){js_back("名称不能为空！");}
if($file==""){js_back("图片不能为空！");}
if($aurl==""){js_back("链接不能为空！");}
if($asort==""){js_back("请返回首页重新操作，如未解决请联系管理员！");}
if($file['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($file,"uploads/");//上传新图片
}
$sql="update activity set aname='$aname',apic='$bpic',asort='$asort',aurl = '$aurl' where aid='$aid'";
$result=mysql_query($sql);
if($result){
	js_go("修改成功！","activelist.php");
}else{ js_back("修改失败！");}
break;
?>