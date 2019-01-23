<?php
require_once("functions.php");
if(!(isset($_COOKIE['ckuid'])&&$_COOKIE['ckuid']>0)){
	js_go("请先登录！","login.php");
}
?>