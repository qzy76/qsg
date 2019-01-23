<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$eid=intval($_GET['eid']);
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$check_sql="SELECT epic FROM evaluation WHERE eid ='$eid'";
$check_result = mysql_query($check_sql);
$check_row = mysql_fetch_assoc($check_result);
$pic = $check_row['epic'];

print_r($pic);
$sql="delete from evaluation where eid='$eid'";
$result=mysql_query($sql);
if($result){
	if($pic!=""){
		$upload=new UploadFile();
		$upload->removeFile($pic,"uploads/");
	}
	js_go("删除成功！","book.php");
}
else{
	js_back("删除失败！");
}
?>