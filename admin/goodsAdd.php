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
<script src="js/qzy_goodsAddDate.js"></script>
<script type="text/javascript" src="js/qzy_class.js" ></script><!--三级联动-->
<script language="javascript" src="ckeditor/ckeditor.js"></script>
<script language="javascript" src="ckfinder/ckfinder.js"></script>
<style type="text/css">
	.dn{display:none;}
	.tu img{border:1px solid #f7f7f7;width: 100px;height: 100px;}
</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加商品</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="innerGoods.php" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="pname" data-validate="required:请输入名称" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="tips"></div>
      <div class="form-group">
        <div class="label">
          <label>所属分类：</label>
        </div>
        <div class="field">
           <select name="cid" class="input ajax1" style="width:100px; line-height:17px; float: left;">
              <option value="0" selected="selected">请选择分类</option>
               <?php
            require_once("../connect.php");
            $classsql="SELECT * FROM classification";
            $classresult=mysql_query($classsql);
            while($classrow=mysql_fetch_assoc($classresult)){ 
            	$cosort=$classrow['cosort'];
            	//exit($cclassresult);
            	?>
                 <option value="<?php echo($classrow['coid']);?>"><?php echo($classrow['coname']);?></option>
        		<?php }?>
            </select>
            <select name="cid" class="input ajax2" style="width:100px; line-height:17px; float: left; margin-left: 10px;">
            </select>
            <select name="pid" class="input ajax3" style="width:100px; line-height:17px; float: left; margin-left: 10px;">
            </select>
            <a href="ccclassificationAdd.php" style="height: 42px; line-height: 42px; padding-left: 15px; color: #FFBB00;">没有找到想要的分类？点我添加分类</a>
        </div>
      </div>
      <div class="tips"></div>
       <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file">+ 上传图一
          		<input type="file" name="file" data-file="pic" data-who="#pic1" class="button bg-blue margin-left" id="image1"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file2">+ 上传图二
          		<input type="file" name="file2" data-file="pic" data-who="#pic2" class="button bg-blue margin-left" id="image2"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file3">+ 上传图三
          		<input type="file" name="file3" data-file="pic" data-who="#pic3" class="button bg-blue margin-left" id="image3"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file4">+ 上传图四
          		<input type="file" name="file4" data-file="pic" data-who="#pic4" class="button bg-blue margin-left" id="image4"  style="float:left;">
          </a>
        </div>
        <div class="field label">
         <a href="javascript:;" class="file file5">+ 上传图五
          		<input type="file" name="file5" data-file="pic" data-who="#pic5" class="button bg-blue margin-left" id="image5"  style="float:left;">
          </a>
        </div>
      </div>     
      <div class="tips"></div>
      <div class="form-group tu">
        <div class="label">
          <label></label>
        </div>
        <div class="field label"><img src="" id="pic1" class="dn"/></div>
         <div class="field label"><img src="" id="pic2" class="dn"/></div>
          <div class="field label"><img src="" id="pic3" class="dn"/></div>
           <div class="field label"><img src="" id="pic4" class="dn"/></div>
            <div class="field label"><img src="" id="pic5" class="dn"/></div>
      </div>     
      <div class="tips"></div>
      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="price" data-validate="plusdouble:请输入大于0的价格" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>优惠金额：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="pre" data-validate="plusdouble:请输入不小于0优惠金额" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>库存量：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="75" name="pinventory" data-validate="plusdouble:请输入不小于0的库存量" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>展示类型：</label>
        </div>
        <div class="field">
          	<lable></lable><input type="checkbox" name="phot" checked="checked"/>热卖</lable>
			<lable><input type="checkbox" name="pnew" checked="checked"/>新品</lable>
			<lable><input type="checkbox" name="ptuan" id="ptuan" checked="checked" class="ptuan" />
			团购</lable>
			<lable><input type="checkbox" name="psale"  checked="checked"/>促销</lable>
        
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>团购截止时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="date" value="2019-08-18 18:18:18" name="check" data-validate="date:团购截止时间必须为日期" />
          <div class="tips" style="line-height: 43px;">例：2018-12-12 18:18:18</div>
        </div>
      </div>
      <div class="clear"></div>
       <div class="form-group">
        <div class="label">
          <label>商品介绍：</label>
        </div>
        <div class="field">
          <textarea  name="pcontent" id="editor1" class="editcontent">等待添加中，请耐心等待...</textarea>
          <script language="javascript">
					var editor=CKEDITOR.replace("pcontent");
					CKFinder.setupCKEditor( editor, 'ckfinder/') ;
					</script>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="psort" value="" id="psort" data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" id="but" type="submit">提交</button>
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
		$(who).prop("src",e.target.result).removeClass('dn');//修改图片 
		}
	});
</script>
</body></html>