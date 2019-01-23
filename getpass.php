<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>找回密码_轻松购</title>
		<link rel="icon" href="img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/general.css"/>
		<link rel="stylesheet" type="text/css" href="user/css/uPhone.css"/>
		<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/upwd.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/sha1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script>
		<style>
		.da,lable{font-size: 20px;}
		.tijiaoxiang{
			margin-top: 0px;
			margin-bottom: 0px;
			line-height: 40px;
		}
		.tijiaoxiang:nth-child(2n){
			margin-bottom: 10px;

		}
		</style>
	</head>
	<body>
		<?php
			require_once ("connect.php");
			require_once ("functions.php");
			require_once ("header_uCenter.php");
		?>
		<div class="main" style="height: 220px;">
			<div class="mTop">
				<ol>
					<li>
						<div><i class="icon iconfont qzy-jindu active"></i>
							<i>1</i>
							<span>验证身份</span>
						</div>
						<div></div>
					</li>
					<li>
						<div><i class="icon iconfont qzy-jindu"></i>
							<i>2</i>
							<span>
								修改密码
								</span>
						</div>
						<div></div>
					</li>
					<li>
						<div><i class="icon iconfont qzy-jindu"></i>
							<i class="icon iconfont qzy-toast"></i>
							<span>完成</span>
						</div>
					</li>
				</ol>
			</div>
			<div class="mbuttom">
					<div class="tijiaoxiang">
						<lable class="lable">用户名：</lable>
						<input autocomplete="off" type="text" class="uname" /><div></div>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">问题一：</lable>
						<span class="da"></span>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">答案一：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='password'" class="a1" /><div></div>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">问题二：</lable>
						<span class="da"></span>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">答案二：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='password'" class="a2" /><div></div>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">问题三：</lable>
						<span class="da"></span>
					</div>
					<div class="tijiaoxiang hidden">
						<lable class="lable">答案三：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='password'" class="a3" /><div></div>
					</div>
					<input type="button" class="btn" value="提交"/>
			</div>
		</div>
		<?php
		require_once ("footer.php");
		?>
	</body>
</html>