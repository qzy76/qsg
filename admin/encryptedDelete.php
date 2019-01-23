<?php
header("Content-type: text/html; charset=utf-8");
require_once ("isAdmin.php");
require_once ("../connect.php");
require_once ("../functions.php");
$ckadid = $_COOKIE['ckadid'];
$sql_check = "SELECT adid FROM admin where adid='$ckadid' and adsuper =1";
$result_check = mysql_query($sql_check);
$row_check = mysql_fetch_assoc($result_check);
if ($row_check['adid'] != "") {
	$qid = intval($_GET['eid']);
	$qsql = "SELECT * FROM encrypted where questions1 ='$qid' or questions2 ='$qid' or questions3 ='$qid'";
	$qresult = mysql_query($qsql);
	$qrow = mysql_fetch_assoc($qresult);
	if ($qrow == "") {
		$sql = "delete from equestion where qid=$qid";
		$result = mysql_query($sql);
		if ($result > 0) {
			$result = mysql_query($sql);
			js_go("删除成功！", "encrypted.php");
		} else {
			js_back("删除失败,请联系管理员！");
		}
	} else {
		js_back("该问题有用户使用，无法删除！");
	}
} else {
	js_back("您暂时没有权限！");
}
?>