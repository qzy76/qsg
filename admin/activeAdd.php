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
	</head>
	<body>
		<div class="panel admin-panel">
			<div class="panel-head">
				<strong><span class="icon-pencil-square-o"></span> 添加页面</strong>
			</div>
			<div class="body-content">
				<form method="post" class="form-x" action="innerActive.php" enctype="multipart/form-data">
					<?php
					require_once ("../connect.php");
					$sql = "SELECT COUNT( * ) as num FROM activepage";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					$sql1 = "SELECT paid FROM activepage ORDER BY paid DESC LIMIT 0 , 1";
					$result1 = mysql_query($sql1);
					$row1 = mysql_fetch_assoc($result1);
					
					?>
					<div class="form-group">
						<div class="label">
							<label>名称：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="aname" placeholder="请输入名称" required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>图片：</label>
						</div>
						<div class="field" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file" class="button bg-blue margin-left" id="image1"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 50px;"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>商品活动页：</label>
						</div>
						<div class="field">
							<input type="radio" checked name="isok" value="1"/>是
							<input type="radio" name="isok" value="0"/>否
							<div class="tips">如为单页，请点否，并在下方输入链接</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>链接：</label>
						</div>
						<div class="field">
							<p style="float: left; height: 40px; line-height: 40px;">pages.php?paid=</p><input style="width: 80px; height: 40px; padding-left: 5px; float: left;" class="aurl" type="text" class="input" placeholder="请输入链接" name="aurl" value="" required/><p style="float: left; height: 40px; padding-left: 5px; line-height: 40px;">提示值（如果失效请输入大于提示值的值）：<?php echo($row1['paid'] + 1); ?></p>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>排序：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="asort" value="<?php echo($row['num'] + 1); ?>" required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field">
						<input type="button" id="" value="提交"  class="button bg-main icon-check-square-o tijiao"/>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(function () {
				var title = $(".aurl").next().html();
				$(".aurl").keyup(function () {
					var aurl = $(this).val();
					var that = $(this);
					
					console.log(aurl);
					if(aurl!=""){
						$.ajax({
							url:"ajaxurl.php",
							type:"POST",
							data:{"aurl":aurl},
							success:function (k){
								if(k=='1'){
									$(that).next().html('该值可以使用！').css("color","#000");
									$('.tijiao').attr('type',"submit");
								}else{
									$(that).next().html('输入的值不能跟以往的值相同！').css("color","red");
									$('.tijiao').attr('type',"button");
								}
							}
						});
					}else{
						$(that).next().html(title).css("color","red");
					}
				})
			});
			
		</script>
	</body>
</html>