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
<script src="js/qzy_goodsAddDate.js" type="text/javascript" charset="utf-8"></script>
<script src="js/qzy_class.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript" src="ckeditor/ckeditor.js"></script>
<script language="javascript" src="ckfinder/ckfinder.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改商品</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerGoodsUpdate.php" enctype="multipart/form-data">
    	 <?php
            require_once("../connect.php");
            $pid=intval($_GET["pid"]);
            $psql="SELECT * FROM product where pid=$pid";
            $presult=mysql_query($psql);
           $prow=mysql_fetch_assoc($presult);
           ?>
       <div class="form-group">
        <div class="label">
          <label>ID：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['pid']);?>" readonly name="pid"/>
          <div class="tips">此处不可修改</div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['pname']);?>" name="pname" data-validate="required:请输入名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="tips"></div>
      <div class="form-group">
        <div class="label">
          <label>所属分类：</label>
        </div>
        <div class="field">
           <div class="field">
           <select name="pclassification" class="input ajax1 qzy qzy1">
            <option value="0">请选择细分类</option>
		   <?php
				$classsql="select * FROM ccclassification";
				$classresult=mysql_query($classsql);
				//记录二级分类的id
				$scid=0;
			   //exit($classsql);
				while($classrow=mysql_fetch_assoc($classresult)){
					if($classrow['cccoid']==$prow['pclassification']){
					$scid=$classrow['cccosort'];
				echo "<option value=' ".$classrow['cccoid']."' selected='selected'>".($classrow['ccconame'])."</option>";
			   
				}else{
					echo "<option value='".$classrow['cccoid']."'>".($classrow['ccconame'])."</option>";
				}
				}
			?>
           </select>
            <select name="cid" class="input ajax2 qzy qzy2">
            	<option value="0">请选择小分类</option>
            <?php
				$qclasssql="select * FROM classification INNER JOIN cclassification ON coid = ccosort";
				$qclassresult=mysql_query($qclasssql);
				$bcid=0;
				$qclassrow=mysql_fetch_assoc($qclassresult);
				$coid=$qclassrow['coid'];
				if($qclassrow['ccoid']==$scid){
					$bcid=$qclassrow['ccosort'];
				}
				$qaclasssql="SELECT * FROM classification INNER JOIN cclassification ON coid = ccosort WHERE ccosort=$coid";
				echo($qaclasssql);
				$qaclassresult=mysql_query($qaclasssql);
				while($qaclassrow=mysql_fetch_assoc($qaclassresult)){
					if($qaclassrow['ccoid']==$scid){
					$bcid=$qclassrow['ccosort'];
				echo "<option value='".$qaclassrow['ccoid']."' selected='selected'>".($qaclassrow['cconame'])."</option>";
			   
				}else{
					echo "<option value='".$qaclassrow['ccoid']."'>".($qaclassrow['cconame'])."</option>";
				}
				}
			?>
            </select>
            <select name="cid" class="input ajax3 qzy qzy3">
            	<option value="0" selected="selected">请选择大分类</option>
            <?php
				$aclasssql="select * FROM classification";
				$aclassresult=mysql_query($aclasssql);
			   //exit($classsql);
				while($aclassrow=mysql_fetch_assoc($aclassresult)){
					if($aclassrow['coid']==$bcid){
				echo "<option value='".$aclassrow['coid']."' selected='selected'>".($aclassrow['coname'])."</option>";
			   
				}else{
					echo "<option value='".$aclassrow['coid']."'>".($aclassrow['coname'])."</option>";
				}
				}
			?>
            </select>
        </div>
      </div>
      </div>
      <div class="tips"></div>
       <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field1" style="float: left;">
         <img src="../uploads/<?php echo($prow['ppic']);?>" id="pic1" alt="" width="110" height="110" />
         <input type="hidden" name="ppic" id="ppic" value="<?php echo($prow['ppic']);?>" />
        </div>
        <div class="field1" style="float: left;">
         <img src="../uploads/<?php echo($prow['ppic2']);?>" id="pic2" alt="" width="110" height="110" />
         <input type="hidden" name="ppic2" id="ppic2" value="<?php echo($prow['ppic2']);?>" />
        </div>
        <div class="field1" style="float: left;">
         <img src="../uploads/<?php echo($prow['ppic3']);?>" id="pic3" alt="" width="110" height="110" />
         <input type="hidden" name="ppic3" id="ppic3" value="<?php echo($prow['ppic3']);?>" />
        </div>
        <div class="field1" style="float: left;">
         <img src="../uploads/<?php echo($prow['ppic4']);?>" id="pic4" alt="" width="110" height="110" />
         <input type="hidden" name="ppic4" id="ppic4" value="<?php echo($prow['ppic4']);?>" />
        </div>
        <div class="field1" style="float: left;">
         <img src="../uploads/<?php echo($prow['ppic5']);?>" id="pic5" alt="" width="110" height="110" />
         <input type="hidden" name="ppic5" id="ppic5" value="<?php echo($prow['ppic5']);?>" />
        </div>
      </div>     
      <div class="tips"></div>
       <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file">+ 上传图一
          		<input type="file" name="file" class="button bg-blue margin-left" id="image1" data-file="pic" data-who="#pic1"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file2">+ 上传图二
          		<input type="file" name="file2" class="button bg-blue margin-left" id="image2" data-file="pic" data-who="#pic2"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file3">+ 上传图三
          		<input type="file" name="file3" class="button bg-blue margin-left" id="image3" data-file="pic" data-who="#pic3"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file4">+ 上传图四
          		<input type="file" name="file4" class="button bg-blue margin-left" id="image4" data-file="pic" data-who="#pic4"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file5">+ 上传图五
          		<input type="file" name="file5" class="button bg-blue margin-left" id="image5" data-file="pic" data-who="#pic5"  style="float:left;">
          </a>
        </div>
      </div>     
      <div class="tips"></div>
      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['price']);?>" name="price" data-validate="plusdouble:请输入大于0的价格" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>优惠金额：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['preferential']);?>" name="pre" data-validate="plusdouble:请输入不小于0优惠金额" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>展示类型：</label>
        </div>
        <div class="field">
          	<label><input type="checkbox" name="phot" value="1" <?php if($prow['phot']==1)echo('checked="checked"');?>  />热卖</label>
			<label><input type="checkbox" name="pnew" value="1" <?php if($prow['pnew']==1)echo('checked="checked"');?>/>新品</label>
			<label><input type="checkbox" name="ptuan" id="ptuan" value="1" <?php if($prow['ptuan']==1)echo('checked="checked"');?>/>团购</label>
			<label><input type="checkbox" name="psale" id="psale" value="1" <?php if($prow['psale']==1)echo('checked="checked"');?>/>促销</label>
        
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>团购截止时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['pcheck']);?>" name="check" data-validate="date:团购截止时间必须为日期" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
       <div class="form-group">
        <div class="label">
          <label>商品介绍：</label>
        </div>
        <div class="field">
          <textarea  name="pcontent" id="editor1" class="editcontent"><?php echo($prow['pcontent']);?></textarea>
          <script language="javascript">
					var editor=CKEDITOR.replace("pcontent");
					CKFinder.setupCKEditor( editor, 'ckfinder/') ;
					</script>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="psort" value="<?php echo($prow['psort']);?>"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" id="but" type="submit"> 提交</button>
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