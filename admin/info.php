<?php require_once("isAdmin.php");?>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title>网站信息</title>
		<link rel="stylesheet" href="css/pintuer.css">
		<link rel="stylesheet" href="css/qzy.css">
		<link rel="stylesheet" href="css/admin.css">
		<script src="js/jquery.js"></script>
		<script src="js/pintuer.js"></script>
		<script src="../js/upload_Pic.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="panel admin-panel">
			<div class="panel-head">
				<strong><span class="icon-pencil-square-o"></span> 网站信息</strong>
			</div>
			<div class="body-content">
				<form method="post" class="form-x"  action="innerInfo.php" enctype="multipart/form-data">
					<?php
					require_once ("../connect.php");
					$prosql = "select * from information where inid = 1";
					$proresult = mysql_query($prosql);
					$prorow = mysql_fetch_assoc($proresult);
					?>
					<div class="form-group">
						<input type="hidden" class="tijiao" id="tijiao" value="<?php echo($prorow['inid']); ?>" />
						<div class="label">
							<label>网站标题：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="ititle" value="<?php echo($prorow['ititle']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>网站顶部推广图：</label>
						</div>
						<div class="field">
							<img src="../uploads/<?php echo($prorow['itlogo']); ?>" id="pic1"/>
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="ftile" data-file="pic" data-who="#pic1" class="button bg-blue margin-left" id="image1"  style="float:left; cursor:pointer;font-size: 100px;">
							</a>
							<input hidden="hidden" value="<?php echo($prorow['itlogo']); ?>" name="btpic" />
							
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>网站LOGO：</label>
						</div>
						<div class="field">
							<img src="../uploads/<?php echo($prorow['ilogo']); ?>"id="pic2" />

							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file" data-file="pic" data-who="#pic2" class="button bg-blue margin-left" id="image1"  style="float:left; cursor:pointer;font-size: 100px;">
							</a>
							<input hidden="hidden" value="<?php echo($prorow['ilogo']); ?>" name="bpic" />
							<div class="tipss">
								图片尺寸：345*86px
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>检索栏显示内容：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="iseacsh" value="<?php echo($prorow['iseacsh']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>版权：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="icopyright" value="<?php echo($prorow['icopyright']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>食品流通许可证号：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="isp" value="<?php echo($prorow['isp']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>ICP号：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="iicp" value="<?php echo($prorow['iicp']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>公网安备：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="irecord" value="<?php echo($prorow['irecord']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>Email：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="iemail" value="<?php echo($prorow['iemail']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>电话：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="iphone" value="<?php echo($prorow['iphone']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>地址：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="iaddress" value="<?php echo($prorow['iaddress']); ?>" />
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field">
							<button class="button bg-main icon-check-square-o tianjia" type="submit">
							添加
							</button>
							<script type="text/javascript" language="javascript">
								$(document).ready(function(e) {
									var tijiao = $(".tijiao").val();
									if(tijiao == "") {
										$('.tianjia').html(" 添加");
									} else {
										$('.tianjia').html(" 修改");
										$('.form-x').attr("action", "infoUpdate.php");
									};
								});
							</script>
						</div>
					</div>
				</form>

			</div>
		</div>
		<script type="text/javascript">
	$('body').on("change",'[data-file="pic"]',function() {
		var who = $(this).data('who');
		var img = document.createElement("img");//获取当前上传信息
		var data = this.files[0];
		//创建读取文件
		var fr = new FileReader();
		fr.readAsDataURL(data);
		fr.onloadend = function (e) {
		$(who).prop("src",e.target.result);//修改图片 
		}
	});
</script>
	</body>
	
</html>