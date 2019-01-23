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
	require_once ("../connect.php");
	require_once ("../functions.php");
	$ckadid = $_COOKIE['ckadid'];
	if($ckadid==""){
		header("location:index.php");
	}
	$sql_check = "SELECT adid FROM admin where adid='$ckadid' and adsuper =1";
	$result_check = mysql_query($sql_check);
	$row_check = mysql_fetch_assoc($result_check);
	if ($row_check['adid']== "") {
		header("location:index.php");
	}
	$adid=intval($_GET["adid"]);
	require_once("../connect.php");
	$sql="select adname,ademail,adsuper from admin where adid=$adid";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改管理员信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerAdminUpdate.php?adid=<?php echo $adid;?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>ID号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $adid;?>" readonly name="aid"/>
          <div class="tips" style="line-height: 42px;">此处不可更改</div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($row['adname']);?>" name="adname" data-validate="required:请输入名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="********" disabled name="pinventory" />
          <div class="tips" style="line-height: 42px;">此处不可手动修改，点击提交后会将密码设为初始值</div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="ademail" value="<?php echo($row['ademail']);?>"  data-validate="email:必须按邮箱格式填写" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>权限：</label>
        </div>
        <div class="field">
          	<label><input type="checkbox" name="adsuper" value="1" <?php if($row['adsuper']==1)echo('checked="checked"');?>  />超级管理员</label>
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
</body></html>