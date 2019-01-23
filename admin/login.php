<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title>登录</title>
		<link rel="stylesheet" href="css/pintuer.css">
		<link rel="stylesheet" href="css/admin.css">
		<script src="js/jquery.js"></script>
		<script src="js/pintuer.js"></script>
	</head>
	<body>
		<div class="bg"></div>
		<div class="container">
			<div class="line bouncein">
				<div class="xs6 xm4 xs3-move xm4-move">
					<div style="height:150px;"></div>
					<div class="media media-y margin-big-bottom"></div>
					<form action="checkadmin.php" method="post">
						<div class="panel loginbox">
							<div class="text-center margin-big padding-big-top">
								<h1>后台管理中心</h1>
							</div>
							<div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
								<div class="form-group">
									<div class="field field-icon-right">
										<input type="text" class="input input-big" name="adname" placeholder="登录账号" data-validate="required:请填写账号" />
										<span class="icon icon-user margin-small"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="field field-icon-right">
										<input type="password" class="input input-big" name="adpwd" placeholder="登录密码" data-validate="required:请填写密码" />
										<span class="icon icon-key margin-small"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="field">
										<input type="text" class="input input-big" name="adcheckno" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
										<img src="../checkno.php" alt="验证码图片" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">
									</div>
								</div>
								<p>
									<input type="checkbox" class="isyes" name="sdate" value="0" onclick="isyes();"/>
									保存登录7天
								</p>
							</div>
							<div style="padding:30px;">
								<input type="submit" class="button button-block bg-main text-big input-big" value="登录">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">//是否保存登录状态
function isyes() {
	var is = $('.isyes').val();
	if(is == 0) {
		$('.isyes').val('7');
	} else {
		$('.isyes').val('0');
	}
}</script>
	</body>
</html>