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
	<?php
		require_once("isAdmin.php");
		require_once("../connect.php");
		require_once("../functions.php");
		$ckaid=$_COOKIE['ckadid'];
		if($ckaid==""){
			header("location:index.php");
		}
		$sql_check="SELECT adsuper FROM admin where adid ='$ckaid' and adsuper = '1'";
		$result_check=mysql_query($sql_check);
		$result_row=mysql_fetch_assoc($result_check);
		if($result_row==""){
			js_go("您当前不是超级管理员","admin.php");
		}
	?>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerUserAdd.php" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>ID号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="ID自动生成，无需输入" disabled/>
          <div class="tips"></div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="uname" data-validate="required:请输入名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="upwd" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>确认密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="upwd1" data-validate="required:请输入密码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="uemail" value=""/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>注册时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="时间自动生成，无需输入" disabled/>
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

</body></html>