<?php require_once("isAdmin.php");?>
<!DOCTYPE html>
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
</head>
<body>
<div class="panel admin-panel">
<?php
	$bid=intval($_GET["bid"]);
	require_once("../connect.php");
	$bsql="select * from banner where Bid=$bid";
	$bresult=mysql_query($bsql);
	$brow=mysql_fetch_assoc($bresult);
?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改轮播图</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="index_innerBannerUpdate.php" enctype="multipart/form-data">
       <div class="form-group">
        <div class="label">
          <label>ID：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($brow['bid']);?>" readonly name="bid"/>
          <div class="tips">此处不可修改</div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($brow['bname']);?>" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
        <img src="../uploads/<?php echo($brow['bpic']);?>" id="pic"/>
         <input hidden="hidden" value="<?php echo($brow['bpic']);?>" name="bpic" />
        </div>
      </div>     
       <div class="form-group">
        <div class="label">
        </div>
        <div class="field" style="width: 320px;">
			<a href="javascript:;" class="file">+ 浏览上传
				<input type="file" name="file" data-file="pic" data-who="#pic" class="button bg-blue margin-left" id="image1" style="float:left;">
			</a>
			<div class="tipss" style="position: absolute; top: 10px; right: 50px;">图片尺寸：1920*400</div>
		</div>
      </div>     
      <div class="form-group">
        <div class="label">
          <label>链接：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($brow['burl']);?>" name="burl" data-validate="required:请输入链接" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="<?php echo($brow['bsort']);?>"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
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
</body></html>