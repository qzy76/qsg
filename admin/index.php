<?php
require_once("isAdmin.php");
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>轻松购后台管理中心</title>
    <link rel="icon" href="../img/nhic.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="../img/nhic.ico" class="radius-circle rotate-hover" height="50" alt="" />轻松购后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="../index.php" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="logout.php"><span class="icon-power-off"></span> 退出登录</a> </div>
<div class="head-2">欢迎<?php echo $_COOKIE['ckadname'] ;?>管理员登录！</div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本管理</h2>
  <ul style="display:block">
  	 <li><a href="info.php" class="on" target="right"><span class="icon-caret-right"></span>网站信息</a></li> 
  	 <li><a href="activelist.php" target="right"><span class="icon-caret-right"></span>活动管理</a></li>  
  	 <li><a href="orderlist.php" target="right">
    <span class="icon-caret-right"></span>订单管理</a></li>
  	 <li><a href="book.php" target="right"><span class="icon-caret-right"></span>评价管理</a></li> 
  	<li><a href="pass.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>首页管理</h2>
  <ul>
    <li><a href="index_banner.php" target="right"><span class="icon-caret-right"></span>广告管理</a></li>    
    <li><a href="index_product.php" target="right"><span class="icon-caret-right"></span>商品栏管理</a></li>    
  </ul> 
  <h2><span class="icon-pencil-square-o"></span>商品管理</h2>
  <ul>
    <li><a href="productlist.php" target="right"><span class="icon-caret-right"></span>商品管理</a></li>
    <li><a href="classificationlist.php" target="right"><span class="icon-caret-right"></span>商品分类管理</a></li>
    
  </ul> 
	<h2><a href="newslist.php" target="right"><span class="icon-pencil-square-o"></span>新闻管理</a></h2>
	<ul>
			<li><a href="newslist.php" target="right"><span class="icon-caret-right"></span>新闻管理</a></li> 
	</ul>
  <h2><span class="icon-pencil-square-o"></span>用户信息管理</h2>
  <ul>
    <li><a href="user.php" target="right"><span class="icon-caret-right"></span>用户账号</a></li>  
       <?php
  $aduid = $_COOKIE['ckadid'];
  require_once("../connect.php");
require_once("../functions.php");
$sql_check="SELECT * FROM admin where adid =$aduid and adsuper = 1";
$result_check=mysql_query($sql_check);
$result_row=mysql_fetch_assoc($result_check);
if($result_row!=""){
  ?>
   <li><a href="encrypted.php" target="right"><span class="icon-caret-right"></span>密保设置</a></li>    
  <?php } ?>
  </ul>
  <?php
if($result_row!=""){
  ?>
  <h2><span class="icon-pencil-square-o"></span>管理员信息管理</h2>
  <ul>   
    <li><a href="admin.php" target="right"><span class="icon-caret-right"></span>管理员账号</a></li>    
  </ul> 
  <?php } ?>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="info.php" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  
</ul>
<div class="admin"> 
  <iframe scrolling="auto" rameborder="0" src="info.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>