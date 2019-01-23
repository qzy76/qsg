<?php require_once("isAdmin.php");?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<link rel="stylesheet" href="css/pintuer.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/qzy.css">
		<script src="js/jquery.js"></script>
		<script src="js/pintuer.js"></script>
		<script src="js/activeadd.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			img{
				max-width: 550px;max-height: 200px;border: 1px solid  #ccc
			}
		</style>
	</head>
	<body>
		<div class="panel admin-panel">
			<div class="panel-head">
				<strong><span class="icon-pencil-square-o"></span> 修改活动信息</strong>
			</div>
			<div class="body-content">
				<form method="post" class="form-x" action="innerPageUpdate.php" enctype="multipart/form-data">
					<?php
					require_once ("../connect.php");
					$aid=$_GET['aid'];
					$sql = "SELECT * FROM activity where aid = $aid";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					?>
					<div class="form-group">
						<div class="label">
							<label>名称：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="aname" placeholder="请输入名称" value="<?php echo $row['aname'];?>" required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>图片：</label>
						</div>
						<div class="field" style="width: 320px;">
							<img src="../uploads/<?php echo $row['apic'];?>" id="pic1"/>
							<input type="hidden" name="apic" id="apic" value="<?php echo $row['apic'];?>" />
							<input type="hidden" name="aid" id="aid" value="<?php echo $row['aid'];?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>图片：</label>
						</div>
						<div class="field" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file" data-file="pic" data-who="#pic1" class="button bg-blue margin-left" id="image1"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 50px;"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>链接：</label>
						</div>
						<div class="field">
							<input type="text" class="input" title="" placeholder="请输入链接" name="aurl" value="<?php echo $row['aurl'];?>"/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>排序：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="asort" value="<?php echo $row['asort'];?>" required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field">
							<button class="button bg-main icon-check-square-o" type="submit">
							提交
							</button>
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