<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$nname=$_POST['nname'];
$file=$_FILES['file'];
$nsort=$_POST['nsort'];
$nsource=$_POST['nsource'];
$ncontent=$_POST['pcontent'];
if($nname==""){js_back("名称不能为空！");}
if($file==""){js_back("图片不能为空！");}
if($ncontent==""){js_back("内容不能为空！");}
if($nsort==""){js_back("排序不能为空！");}
if($nsource==""){js_back("内容来源不能为空！");}
$upload=new UploadFile();
$bpic=$upload->upload($file,"uploads/");
$sql="insert into news(nname,npic,nsource,nsort,ncontent) values
('$nname','$bpic','$nsource','$nsort','$ncontent')";
//exit($sql);
$result=mysql_query($sql);
if($result){ js_go("添加成功！","newsAdd.php");}
else{ js_back("添加失败！");}
?>