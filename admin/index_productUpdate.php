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
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
<?php
	$cBid=intval($_GET["cBid"]);
	require_once("../connect.php");
	$psql="SELECT * FROM classblock INNER JOIN classification ON coid = cBcoid where cBid=$cBid";
	$presult=mysql_query($psql);
	$prow=mysql_fetch_assoc($presult);
	?>
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改添加分类栏</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="index_innerProductUpdate.php?cBid=<?php echo($prow['cBid'])?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>ID：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['cBid']);?>" readonly name="cBid"/>
          <div class="tips">此处不可修改</div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <select name="cid" class="input ajax1" style="width:100px; line-height:17px; float: left;">
              <option value="0" selected="selected">请选择分类</option>
               <?php
            require_once("../connect.php");
            $classsql="SELECT * FROM classification";
            $classresult=mysql_query($classsql);
            while($classrow=mysql_fetch_assoc($classresult)){
            if($classrow['coid']==$prow['cBid']){
				echo "<option value=' ".$classrow['coid']."' selected='selected'>".($classrow['coname'])."</option>";
			   
				}else{
					echo "<option value='".$classrow['coid']."'>".($classrow['coname'])."</option>";
				}
				}
			?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>主色调：</label>
        </div>
        <div class="field">
        <input type="color" style="width: 50px; height: 42px;"name="cBcolor" data-color = "se" value="<?php echo($prow['cBcolor']);?>" data-validate="required:请选择颜色"/>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>图片文本1：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['cBtitle1']);?>" name="cBtitle1" data-validate="required:请输入文本1" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
       <div class="form-group">
        <div class="label">
          <label>图片文本2：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['cBtitle2']);?>" name="cBtitle2" data-validate="required:请输入文本2" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
       <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
        <img src="../uploads/<?php echo($prow['cBpic']);?>"  id="pic"/>
         <input hidden="hidden" value="<?php echo($prow['cBpic']);?>" name="cBpic" />
        </div>
      </div>     
       <div class="form-group">
        <div class="label">
        </div>
        <div class="field label">
          
         <a href="javascript:;" class="file">+ 浏览上传
          		<input type="file" name="file"  data-file="pic" data-who="#pic" class="button bg-blue margin-left" id="image1"  style="float:left;">
          </a>
          <div class="tipss">图片尺寸238px*220px且为png格式</div>
        </div>
      </div>    
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['cBsort']);?>" name="cBsort" data-validate="plusdouble:请输入不小于0的排序" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>商品分类表对应值：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['cBcoid']);?>" disabled/>
          <div class="tips">此处对应大分类表数值，不可更改</div>
        </div>
      </div>
      <div class="clear"></div>
       <div class="form-group">
        <div class="label">
          <label>修改时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" disabled value="<?php echo($prow['cBdate']);?>"/>
          <div class="tips">此处自动生成，不可修改</div>
        </div>
      </div>
      <div class="clear"></div>
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
	$('body').on("change",'[data-color = "se"]',function() {
		console.log($(this).val());
		
	});
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