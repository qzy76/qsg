<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>密码重置 | 轻松购 | 账户中心</title>
		<link rel="icon" href="../img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/uPhone.css"/>
		<link rel="stylesheet" type="text/css" href="../css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/header.css"/>
		<link rel="stylesheet" type="text/css" href="../fonts/iconfont.css"/>
		<script src="../js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/upwd.js" type="text/javascript" charset="utf-8"></script>
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

			?>
		<div class="main" style="height: 300px;">
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
						<lable class="lable" style="font-size: 20px;">当前密码：</lable>
						<input autocomplete="off" type="text" onfocus="this.type='password'" class="upwds" /><div></div>
					</div>
					<input type="button" class="btn" value="提交"/>
			</div>
		</div>
		<?php
		require_once ("../footer.php");
		?>
	</body>
</html>