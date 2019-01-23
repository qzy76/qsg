<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$pname=$_POST['pname'];
$pid=$_POST['pid'];
$price=$_POST['price'];
$pinventory=$_POST['pinventory'];
$pre=$_POST['pre'];
$phot=$_POST['phot'];
$pnew=$_POST['pnew'];
$psale=$_POST['psale'];
$ptuan=$_POST['ptuan'];
$pcheck=$_POST['check'];
$bfile=$_FILES['file'];
$bfile2=$_FILES['file2'];
$bfile3=$_FILES['file3'];
$bfile4=$_FILES['file4'];
$bfile5=$_FILES['file5'];
$psort=$_POST['psort'];
$pcontent=$_POST['pcontent'];
if($pname==""){js_back("名称不能为空！");}
if($phot==""){$phot="0";}
if($pnew==""){$pnew="0";}
if($psale==""){$psale="0";}
if($ptuan==""){$ptuan="0";}
if($pid==""){js_back("获取不到分类值，添加失败！");}
if($price==""){js_back("价格不能为空！");}
if(!$price<0){js_back("价格不能小于0！");}
if($price<$pre){js_back("优惠金额不能大于价格！");}
if($psort<0){js_back("排序必须为数字！");}
if($pcheck!=""){
	if(date('Y-m-d H:i:s', strtotime($pcheck))!==$pcheck){
		js_back("截止时间格式错误！");
	}
}
if($pcontent==""){js_back("介绍不能为空！");}
if($ptuan==1){
	if($pcheck!=true){
		js_back("团购商品必须写截止时间！");
	}
}
$upload=new UploadFile();
$bpic=$upload->upload($bfile,"uploads/");
$bpic2=$upload->upload($bfile2,"uploads/");
$bpic3=$upload->upload($bfile3,"uploads/");
$bpic4=$upload->upload($bfile4,"uploads/");
$bpic5=$upload->upload($bfile5,"uploads/");
require_once("../connect.php");
$sql="insert into product(ppic,ppic2,ppic3,ppic4,ppic5,pname,price,preferential,phot,pnew,ptuan,psale,pclassification,psort,pcheck,pinventory,pcontent) values
('$bpic','$bpic2','$bpic3','$bpic4','$bpic5','$pname','$price','$pre','$phot','$pnew','$ptuan','$psale','$pid','$psort','$pcheck','$pinventory','$pcontent')";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","goodsAdd.php");}
else{ js_back("添加失败！");}
?>