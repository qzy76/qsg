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
</head>
<body>
	<?php if(strpos($_SERVER['HTTP_REFERER'],'index_product.php') == false){header("location:index.php");} ?>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加分类栏</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerClassAdd.php" enctype="multipart/form-data">
    	 <?php
				require_once("../connect.php");
				$ssql="SELECT COUNT( * ) as num FROM classblock";
				$sresult=mysql_query($ssql);
				$srow=mysql_fetch_assoc($sresult);
				?>
      <div class="form-group">
        <div class="label">
          <label>分类：</label>
        </div>
        <div class="field">
           <select name="cBcoid" class="input ajax1" style="width:100px; line-height:17px; float: left;">
              <option value="0" selected="selected">请选择分类</option>
               <?php
            require_once("../connect.php");
            $classsql="SELECT * FROM classification";
            $classresult=mysql_query($classsql);
            while($classrow=mysql_fetch_assoc($classresult)){ 
            	$cosort=$classrow['cosort'];
            	?>
                 <option value="<?php echo($classrow['coid']);?>"><?php echo($classrow['coname']);?></option>
        		<?php }?>
           </select>
          
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>主色调：</label>
        </div>
        <div class="field">
          <input type="color" name="cBcolor" required/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片文本1：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cBtitle1" value="" required/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片文本2：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cBtitle2" value=""  required/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field label" style="width: 320px;">
         <a href="javascript:;" class="file">+ 浏览上传
          		<input type="file" name="file" class="button bg-blue margin-left" id="image1"  style="float:left;">
          </a>
          <div class="tipss" style="position: absolute; top: 10px; right: 50px;"></div>          
        </div>
      </div>
      
       <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="cBsort" value="<?php echo($srow['num']+1);?>"  required/>
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