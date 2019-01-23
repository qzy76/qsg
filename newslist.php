<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻列表_轻松购</title>
<link rel="icon" href="img/nhic.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/header.css"/>
<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
<link rel="stylesheet" type="text/css" href="css/news.css"/>
<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
<script src="../js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/index_cart.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
	<?php
	require_once ("header2.php");
	?>
<div class="main">
<div class="main_left">
<ul>
<?php
require_once("connect.php");
$nsql = "select * from news order by ndate LIMIT 0,10";
$nresult = mysql_query($nsql);

while($nrow = mysql_fetch_assoc($nresult)){
?>
<li>
<img src="uploads/<?php echo($nrow['npic']); ?>"/>
<div class="txt_wrap">
<a href="news.php?nid=<?php echo($nrow['nid']); ?>"  target="_blank">
<h1 title="<?php echo($nrow['nname']); ?>"><?php echo($nrow['nname']); ?></h1>
<div class="content"><?php echo($nrow['ncontent']); ?></div>
<span>查看详细&gt;&gt;</span>
<div class="date_tag"><?php echo($nrow['ndate']); ?></div>
</a>
</div>
</li>
<?php } ?>
</ul>
</div>
<?php
require_once ("newmoden.php");
?>