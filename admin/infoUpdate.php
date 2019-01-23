<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../functions.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
$ititle=$_POST['ititle'];
$bpic=$_POST['bpic'];
$bfile=$_FILES['file'];
$btpic=$_POST['btpic'];
$btfile=$_FILES['ftile'];
$icopyright=$_POST['icopyright'];
$iseacsh=$_POST['iseacsh'];
$iicp=$_POST['iicp'];
$isp=$_POST['isp'];
$irecord=$_POST['irecord'];
$iemail=$_POST['iemail'];
$iphone=$_POST['iphone'];
$iaddress=$_POST['iaddress'];
if($ititle==""){
	js_back("网站名称后缀不能为空！");
}
if($bfile['tmp_name']==""){
	if($bpic['tmp_name']==""){
	js_back("请上传图片!");
}
}
if($icopyright==""){
	js_back("版权信息不能为空！");
}
if($iicp==""){
	js_back("ICP证号不能为空！");
}
if($isp==""){
	js_back("ISP证号不能为空！");
}
if($irecord==""){
	js_back("食品流通许可证号不能为空！");
}
if($irecord==""){
	js_back("公网备案号不能为空！");
}
if($iemail==""){
	js_back("邮箱号不能为空！");
}
if($iphone==""){
	js_back("电话不能为空！");
}

if($iaddress==""){
	js_back("地址不能为空！");
}
if($bfile['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($bpic,"uploads/");//先删除旧图片
	$bpic=$upload->upload($bfile,"uploads/");//上传新图片
}
if($btfile['tmp_name']!=""){//有新的图片上传
	$upload=new UploadFile();
	$upload->removeFile($btpic,"uploads/");//先删除旧图片
	$btpic=$upload->upload($btfile,"uploads/");//上传新图片
}
$sql="update information set ititle='$ititle',iseacsh='$iseacsh',ilogo='$bpic',itlogo='$btpic',icopyright='$icopyright',iicp='$iicp',isp='$isp',irecord='$irecord',iemail='$iemail',iphone='$iphone',iaddress='$iaddress' where inid=1";
$result=mysql_query($sql);
if($result){ js_go("修改成功！","info.php");}
else{ js_back("修改失败！");}
?>