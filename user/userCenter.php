<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心_轻松购</title>
		<link rel="icon" href="../img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/userCenter.css"/>
		<link rel="stylesheet" type="text/css" href="../css/header.css"/>
		<link rel="stylesheet" type="text/css" href="../css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="../fonts/iconfont.css"/>
		<script src="../js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/index_cart.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php
			require_once ("../connect.php");
			require_once ("../functions.php");
			require_once ("../header_uCenter.php");
			if($uid!=""){
		?>
		<?php 
			$issecurity=5;//默认值为5，哪个达不到就减一
			if($uid!=""){
				$sql = "select * from users where uid=$uid";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);
			}
			$usecurity = $row['usecurity'];
			$phone = $row['uphone'];
			$email = $row['uemail'];
			if($usecurity!="1"){
				$issecurity--;
			}
			require_once ("../UpdateStar.php");//将手机号/邮箱号中间改成*
			if($email==""){
				$issecurity--;
			}else{
				$email = hideStar($email);
			}
			if($phone==""){
				$issecurity--;
			}
			$sql_encrypted = "select * from encrypted where euid=$uid";
			$result_encrypted = mysql_query($sql_encrypted);
			$row_encrypted = mysql_fetch_assoc($result_encrypted);
			$encrypted = $row_encrypted['euid'];
			if($encrypted==""){
				$issecurity--;
			}
			
			
			if($phone!=""){
				$phone = hideStar($phone);
			}
			echo $issecurity;
		?>
		<div class="main">
			<div class="list">
				<a href="#" target="_blank">
					<img src="../img/user_Pic.jpg" width="100" height="100"/>
				</a>
				<ol>
					<li><a href="#">账号管理</a></li>
					<li><a href="#">安全设置</a></li>
					<li><a href="#">个人资料</a></li>
					<li><a href="#">个人成长信息</a></li>
					<li><a href="#">支付宝绑定设置</a></li>
					<li><a href="#">微信绑定设置</a></li>
					<li><a href="#">微博绑定设置</a></li>
					<li><a href="#">个人交易信息</a></li>
					<li><a href="#">收货地址</a></li>
					<li><a href="#">网站提醒</a></li>
					<li><a href="#">轻松购网页版设置</a></li>
					<li><a href="#">应用授权</a></li>
					<li><a href="#">分享绑定</a></li>
				</ol>
			</div>
			<div class="title">
				<dl>
					<dt>您的基础信息</dt>
					<dd>
						<ul class="unews">
							<li>
								<span>会&nbsp;&nbsp;&nbsp;员&nbsp;&nbsp;&nbsp;名:</span>
								<span><?php echo $row['uname'];?></span>
							</li>
							<li>
								<span>登&nbsp;录&nbsp;邮&nbsp;箱:</span>
								<span><?php echo $email ;?></span>
								<span></span>
								<span><?php 
								if($email==""){
									echo'<a target="_blank" href="email.php">立即绑定</a>'; 
								}else{
									echo '<a target="_blank" href="email.php">修改邮箱</a>';
								}
								?></span>
							</li>
							<li>
								<span>绑&nbsp;定&nbsp;手&nbsp;机:</span>
								<span><?php echo $phone;?></span>
								<span><?php 
								if($phone==""){
									echo'<a target="_blank" href="uPhone.php">立即绑定</a>'; 
								}else{
									echo '<a target="_blank" href="uPhone.php">修改手机</a>';
								}
								?></span>
								<span>开启手机登录</span>
							</li>
							<li>
								<span>(该手机仅用户安全身份验证，不用于账户登录，如需登录，请点击开启手机登录按钮)</span>
							</li>
						</ul>
					</dd>
					<dt>您的安全服务</dt><br />
					<dd>
    					<div class="security">
    						<p>安全等级：<span><?php if($issecurity>4){
    							echo '高';
    						}else if($issecurity>=3){
    							echo '中';
    						}else{
    							echo '低';
    						}?></span></p>
    						<div class="issecurity <?php if($issecurity==5){
    							
    						}else if($issecurity==4){
    							echo 'issecurity1';
    						}else if($issecurity==3){
    							echo 'issecurity2';
    						}else{
    							echo 'issecurity3';
    						} ?>"></div>
    						<i class="icon iconfont qzy-anquan <?php if($issecurity==5){
    						}else if($issecurity==4){
    							echo 'security1';
    						}else if($issecurity==3){
    							echo 'security2';
    						}else{
    							echo 'security3';
    						} ?>""></i>
    					</div>
					</dd>
					<dd class="mibao">
						<ul>
							<li>
								<div><i class="icon iconfont qzy-gouxuan"></i><br />已完成</div>
								<div>身 份 认 证</div>
								<div>用于提升账号的安全性和信任级别。</div>
								<div><a>查看</a></div>
							</li>
							<li>
								<div>
									<?php 
										if($p=="1"){
											echo'<i class="icon iconfont qzy-cha"></i><br /><b class="red">不安全</b>';
										}else{
											echo'<i class="icon iconfont qzy-gouxuan"></i><br />已设置';
										}
									?>
									</div>
								<div>登 录 密 码</div>
								<div>安全性高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度超过6位以上的密码。</div>
								<div>
									<?php 
										if($p=="1"){
											echo'<a class="red f16" target="_blank" href="updatePwd.php">点我去重置</a>';
										}else{
											echo'<a target="_blank" href="updatePwd.php">修改</a>';
										}
									?>
								</div>
							</li>
							<li>
								<div><?php 
										if($encrypted==""){
											echo'<i class="icon iconfont qzy-cha"></i><br /><b class="red">未设置</b>';
										}else{
											echo'<i class="icon iconfont qzy-gouxuan"></i><br />已设置';
										}
									?></div>
								<div>密 保 问 题</div>
								<div>是您找回登录密码的方式之一。建议您设置一个容易记住，且最不容易被他人获取的问题及答案，更有效保障您的密码安全。</div>
								<div><?php 
										if($encrypted==""){
											echo'<a class="red f16" target="_blank" href="encrypted.php">点我去设置</a>';
										}else{
											echo'<a target="_blank" href="encrypted.php">维护</a>';
										}
									?></div>
							</li>
							<li>
								<div>
									<?php 
										if($phone==""){
											echo'<i class="icon iconfont qzy-cha"></i><br /><b class="red">未绑定</b>';
										}else{
											echo'<i class="icon iconfont qzy-gouxuan"></i><br />已绑定';
										}
									?></div>
								<div>绑 定 手 机</div>
								<div>绑定手机后，您即可享受轻松购的服务，如手机找回密码等。</div>
								<div>
									<?php 
										if($phone==""){
											echo'<a class="red f16" target="_blank" href="uPhone.php">立即绑定</a>';
										}else{
											echo'<a target="_blank" href="uPhone.php">修改</a>';
										}
									?>
								</div>
							</li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
		<?php 
		require_once ("../footer.php");
		}else{?>
			<script type="text/javascript">loginnow ();</script>
		<?php }?>
	</body>
</html>