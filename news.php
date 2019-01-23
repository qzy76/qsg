<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<?php
require_once ("connect.php");
$nid = intval($_GET['nid']);
$nsql = "select * from news where nid=$nid";
$nresult = mysql_query($nsql);
$nrow = mysql_fetch_assoc($nresult);
?>
<title><?php echo($nrow['nname']); ?>_轻松购</title>
<link rel="icon" href="img/nhic.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/news.css"/>
<link rel="stylesheet" type="text/css" href="css/header.css"/>
<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
<link rel="stylesheet" type="text/css" href="css/news.css"/>
<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">$(function() {
	var a = $(".new").width();
	var b = $(".new img").width();
	$(".new img").css("margin-left", (a - b) / 2);
});</script>
</head>
<body>
	<?php
	require_once ("header2.php");
	require_once("connect.php");
	$nid=$_GET['nid'];
	$nsql = "select * from news where nid=$nid";
	$nresult = mysql_query($nsql);

	$nrow = mysql_fetch_assoc($nresult);
	?>
	<div class="main">
		<div class="main_left new">
			<div class="left_main">
			<h1><?php echo($nrow['nname']); ?></h1>
			<p><a>来源：</a><a><?php echo($nrow['nsource']); ?></a><i><?php echo($nrow['ndate']); ?></i></p>
			
			<img src="uploads/<?php echo($nrow['npic']); ?>"/>
			<div class="content"><?php echo($nrow['ncontent']); ?></div>
		</div>
	</div>
<?php
require_once ("newmoden.php");
?>