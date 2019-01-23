<?php
header("Content-type: text/html; charset=utf-8");
require_once ("isAdmin.php");
require_once ("../functions.php");
require_once ("../connect.php");
$aduid = $_COOKIE['ckadid'];
$upwd0 = $_POST['mpass'];
$upwd = $_POST['newpass'];
$upwd1 = $_POST['renewpass'];
if ($upwd0 == "") {
	js_back("密码不能为空！");
}
if ($upwd == "") {
	js_back("密码不能为空！");
}
if ($upwd != $upwd1) {
	js_back("两次密码不一致，请重新输入！");
}
$sql_check = "SELECT * FROM admin where adid =$aduid";
$result_check = mysql_query($sql_check);
if ($result_check > 0) {
	$sql_update = "update admin set adpwd=sha1('$upwd') where adid=$aduid";
	$result_update = mysql_query($sql_update);
	if ($result_update) {echo js_go("修改成功", "pass.php");
	} else { echo js_back("修改失败！");
	}
} else {
	js_back("请刷新重试！");
}
?>