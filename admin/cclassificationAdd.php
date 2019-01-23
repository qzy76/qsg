<?php require_once("isAdmin.php");?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/qzy.css">
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加商品小分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerCclassification.php" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>所属分类：</label>
        </div>
        <div class="field">
           <select name="coid" class="input ajax1" style="width:100px; line-height:17px; float: left;">
              <option value="0" selected="selected">请选择分类</option>
               <?php
            require_once("../connect.php");
            $classsql="SELECT * FROM classification";
            $classresult=mysql_query($classsql);
            while($classrow=mysql_fetch_assoc($classresult)){ 
            	$cosort=$classrow['cosort'];
            	?>
                 <option name="class" value="<?php echo($classrow['coid']);?>"><?php echo($classrow['coname']);?></option>
        		<?php }?>
           </select>
          
        </div>
      </div>
      <div class="tips"></div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="cconame" data-validate="required:请输入名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="ckcosort" value=""  data-validate="number:排序必须为数字" />
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