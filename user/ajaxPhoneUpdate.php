<?php
$uid=$_COOKIE['ckuid'];
$uphone=$_POST['uphone'];
if($uphone!=0){
require_once("../connect.php");
$sql="update users set uphone='$uphone' where uid=$uid";
$result=mysql_query($sql);
if($result){echo json_encode(1);}
else{ echo json_encode(0);}
}
?>