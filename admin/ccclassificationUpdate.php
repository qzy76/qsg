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
	$cccoid=intval($_GET["cccoid"]);
	require_once("../connect.php");
	$bsql="select * from ccclassification where cccoid=$cccoid order by cckcosort";
	$bresult=mysql_query($bsql);
	$brow=mysql_fetch_assoc($bresult);
?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改商品细分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerCcclassificationUpdate.php?cccoid=<?php echo($brow['cccoid'])?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($brow['ccconame']);?>" name="ccconame" data-validate="chinese:请输入中文名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cckcosort" value="<?php echo($brow['cckcosort']);?>"  data-validate="number:排序必须为数字" />
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