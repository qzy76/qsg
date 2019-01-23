<?php require_once("isAdmin.php");?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/qzy.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script language="javascript" src="ckeditor/ckeditor.js"></script>
<script language="javascript" src="ckfinder/ckfinder.js"></script>
<style type="text/css">
	.dn{display: none;}
	.imggg{height: 200px;border:1px solid #f7f7f7;}
</style>
</head>
<body>
<div class="panel admin-panel">
	<div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加新闻</strong></div>
		<div class="body-content">
		<form method="post" class="form-x" action="innerNews.php" enctype="multipart/form-data">
			<?php
				require_once("../connect.php");
				$ssql="SELECT COUNT( * ) as num FROM news";
				$sresult=mysql_query($ssql);
				$srow=mysql_fetch_assoc($sresult);
			?>
			<div class="form-group">
			<div class="label">
				<label>标题：</label>
			</div>
			<div class="field">
		  <input type="text" class="input" name="nname" value=""  required/>
		  <div class="tips"></div>
		</div>
	  </div>
	  <div class="form-group">
			<div class="label">
				<label>来源：</label>
			</div>
			<div class="field">
		  <input type="text" class="input" name="nsource" value=""  required/>
		  <div class="tips"></div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="label"><label>图片：</label></div>
		<div class="field label" style="width: 320px;">
			<a href="javascript:;" class="file">+ 浏览上传<input type="file" name="file" data-file="pic" data-who="#pic" class="button bg-blue margin-left" id="image1"  style="float:left;"></a>		 
		</div>
	  </div>
	  <div class="form-group">
		<div class="label"><label></label></div>
		<div class="field label" style="width: 320px;"><img src=""id="pic" class="dn imggg"/></div>
	  </div>
	  <div class="form-group">
		<div class="label"><label>内容：</label></div>
		<div class="field">
			<textarea  name="pcontent" id="editor1" class="editcontent" required></textarea>
				<script language="javascript">
					var editor=CKEDITOR.replace("pcontent");
					CKFinder.setupCKEditor( editor, 'ckfinder/') ;
				</script>
			<div class="tips"></div>
		</div>
	  </div>
	   <div class="form-group">
		<div class="label">
		  <label>排序：</label>
		</div>
		<div class="field">
		  <input type="text" class="input" name="nsort" value="<?php echo($srow['num']+1);?>" required/>
		  <div class="tips"></div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="label">
		  <label></label>
		</div>
		<div class="field">
		  <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
		</div>
	  </div>
	</form>
  </div>
</div>
</body>
<script type="text/javascript">
$(function () {
	$('body').on("change",'[data-file="pic"]',function() {
		var who = $(this).data('who');
		var img = document.createElement("img");//获取当前上传信息
		var data = this.files[0];
		//创建读取文件
		var fr = new FileReader();
		fr.readAsDataURL(data);
		fr.onloadend = function (e) {
		$(who).prop("src",e.target.result).removeClass('dn');//修改图片 
		}
	});
});
</script>
</html>