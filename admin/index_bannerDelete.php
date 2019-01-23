<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$bid=intval($_GET['bid']);
require_once("../connect.php");
require_once("../functions.php");
require_once("../uploadfile.class.php");
$check_sql = "select bpic from banner where bid=$bid";
$check_result=mysql_query($check_sql);
$check_row = mysql_fetch_assoc($check_result);
$pic=$check_row['bpic'];
$sql="delete from banner where bid=$bid";
$result=mysql_query($sql);
if($result>0){
	$upload=new UploadFile();
	$upload->removeFile($pic,"uploads/");//删除图片
	js_go("删除成功！","index_banner.php");
}
else{
	js_back("删除失败！");
}
js_alert($sql);
?>