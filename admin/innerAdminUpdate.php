<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$aduid = $_COOKIE['ckadid'];
require_once("../connect.php");
require_once("../functions.php");
$sql_check="SELECT * FROM admin where adid =$aduid and adsuper = 1";
$result_check=mysql_query($sql_check);
$row_check=mysql_fetch_assoc($result_check);
if($row_check['adid']!=""){
	$adid=intval($_GET['adid']);
	$adname=$_POST['adname'];
	$ademail=$_POST['ademail'];
	$adsuper=$_POST['adsuper'];
	if($adid==""){
		js_back("请刷新重试！");
	}else{
		$sql_check1="SELECT * FROM admin where adid =$adid and adsuper = 1";
		$result_check1=mysql_query($sql_check1);
		$row_check1=mysql_fetch_assoc($result_check1);
		if($row_check1['adid']!=""){
			if($adsuper!="1"){
			js_back("该用户为超级管理员，无法修改管理员级别！");}
		}
	}
	if($adname==""){
		js_back("用户名不能为空！");
	}
	if($adsuper==""){$adsuper="0";}
	$sql="update admin set adname='$adname',adpwd='40bd001563085fc35165329ea1ff5c5ecbdbbeef',ademail='$ademail',adsuper='$adsuper' where adid=$adid";
	$result=mysql_query($sql);
	if($result){ js_go("修改成功！","admin.php");}
	else{ js_back("修改失败！");}
}else{
	js_back("您暂时没有修改权限！");
}
	?>
</body>
</html>