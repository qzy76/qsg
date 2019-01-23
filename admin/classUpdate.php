
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
          <input type="text" class="input w50" value="<?php echo($prow['preferential']);?>" name="pre" data-validate="plusdouble:请输入不小于0的优惠金额" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>库存量：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo($prow['pinventory']);?>" name="pinventory" data-validate="plusdouble:请输入不小于0的库存量" />
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