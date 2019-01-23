<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../connect.php");
require_once("../functions.php");
require_once("../uploadfile.class.php");
if($asort=="0"){$asort="";}
$papro=$_POST['papro'];//所有商品项和标题的数据//取消转译
//echo($papro);
$paname=$_POST['paname'];//活动名称
$file1=$_FILES['file1'];//页面背景图片
$pacolor=$_POST['pacolor'];//页面填充色
//exit($pacolor);
$file2=$_FILES['file2'];//领券图片
$file3=$_FILES['file3'];//活动介绍图片
$file4=$_FILES['file4'];//标题背景图片
if($paname==""){js_back("活动名称不能为空！");}
if($file1==""){js_back("页面背景图片不能为空！");}
if($pacolor==""){js_back("填充色值不能为空！");}
if($file4==""){js_back("标题背景图不能为空！");}
if($papro==""){js_back("出现错误，请返回首页重试");}
$upload=new UploadFile();
$bpic1=$upload->upload($file1,"uploads/");
$bpic2=$upload->upload($file2,"uploads/");
$bpic3=$upload->upload($file3,"uploads/");
$bpic4=$upload->upload($file4,"uploads/");
//添加后面页面的数据
$sql2="insert into activepage(paname,papic,paquanpic,paapic,patitleBagPic,pacolor,papro) values
('$paname','$bpic1','$bpic2','$bpic3','$bpic4','$pacolor','$papro')";
//exit($sql2);
$result2=mysql_query($sql2);
if($result2){
	 js_go("添加成功！","activelist.php");}
else{
js_back("添加失败！");
}
?>