<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../functions.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
$ititle=$_POST['ititle'];
$btfile=$_FILES['ftile'];
$bfile=$_FILES['file'];
$iseacsh=$_POST['iseacsh'];
$icopyright=$_POST['icopyright'];
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
	js_back("请上传logo!");
}
if($btfile['tmp_name']==""){
	js_back("请上传顶部推广图!");
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
$upload=new UploadFile();
$bpic=$upload->upload($bfile,"uploads/");
$btpic=$upload->upload($btfile,"uploads/");
//exit($bpic);
$sql="insert into information(ititle,itlogo,ilogo,iseacsh,icopyright,iicp,isp,irecord,iemail,iphone,iaddress) values('$ititle','$btpic','$bpic','$iseacsh','$icopyright','$iicp','$isp','$irecord','$iemail','$iphone','$iaddress')";
exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","info.php");}
else{ js_back("添加失败！");}
?>