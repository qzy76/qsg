<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>手机号设定 | 轻松购 | 账户中心</title>
		<link rel="icon" href="../img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/uPhone.css"/>
		<link rel="stylesheet" type="text/css" href="../css/header.css"/>
		<link rel="stylesheet" type="text/css" href="../css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="../fonts/iconfont.css"/>
		<script src="../js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/uphone.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/sha1.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/index_cart.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php
				require_once ("../connect.php");
				require_once ("../functions.php");
				require_once ("../header_uCenter.php");
				if($uid==""){
					js_go("请在个人中心页登录！","userCenter.php");
				}
				$sql = "select * from users where uid=$uid";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
				$email = $row['uemail'];
				if($email==""){
					js_go("当前账号未设置邮箱号，请先设置邮箱号！","email.php");
				}
				$phone = $row['uphone'];
				$uemail=1;
			?>
		<div class="main">
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
								<?php
								if($phone==""){echo'添加手机号码';}else{echo'修改手机号码';}
								?>
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
						<lable class="lable" style="font-size: 20px;">邮箱：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='email'" name="uemail" class="inputs uemail" placeholder="请输入您的邮箱"/>
						<div></div>
					</div>
					<div class="tijiaoxiang"  autocomplete="off" disableautocomplete>
						<lable style="font-size: 20px;">密码：</lable>
						<input autocomplete="off" disableautocomplete type="text" onfocus="this.type='password'"name="upwd" class="inputs myclass" style="display: none;"/>
						<input type="password" class="upwds" maxlength="32" size="20" aria-required="true"  
placeholder="请输入您的密码" />
						<div></div>
					</div>
					<input type="button" value="提交" class="btn"/>
			</div>
		</div>
		<?php
		require_once ("../footer.php");
		?>
	</body>
</html>