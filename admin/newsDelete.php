<?php
header("Content-type: text/html; charset=utf-8");
require_once("isAdmin.php");
$nid=intval($_GET['nid']);
require_once("../uploadfile.class.php");
require_once("../connect.php");
require_once("../functions.php");
$pic_sql="select npic form news where nid = $nid";
$pic_result=mysql_query($pic_sql);
$pic_row = mysql_fetch_assoc($pic_result);
$pic=$pic_row['npic'];
$sql="delete from news where nid=$nid";
$result=mysql_query($sql);
if($result>0){
	if($pic!=""){
		$upload=new UploadFile();
		$upload->removeFile($pic,"../uploads/");
	}
	js_go("删除成功！","newslist.php");
}
else{
	js_back("删除失败！");
}
?>