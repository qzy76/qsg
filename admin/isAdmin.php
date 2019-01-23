<?php
$aduid = $_COOKIE['ckadid'];
if(!(isset($aduid)&&$aduid>0))
{
	header("location:login.php");
}
?>