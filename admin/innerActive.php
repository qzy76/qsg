<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$aname=$_POST['aname'];
$file=$_FILES['file'];
$asort=$_POST['asort'];
$aurl=$_POST['aurl'];
if($aname==""){js_back("名称不能为空！");}
if($file==""){js_back("图片不能为空！");}
if($aurl==""){js_back("链接不能为空！");}
if($asort==""){js_back("请返回首页重新操作，如未解决请联系管理员！");}
$upload=new UploadFile();
$bpic=$upload->upload($file,"uploads/");

$sql="insert into activity(aname,apic,asort,aurl) values('$aname','$bpic','$asort','$aurl')";
//exit($sql);
$result=mysql_query($sql);
if($result){
	js_go("添加成功！","activelist.php");
}else{ js_back("添加失败！");}
break;
?>