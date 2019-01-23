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
		<script src="../js/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/activemMake.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pagesupdate.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="panel admin-panel">
			<div class="panel-head">
				<strong><span class="icon-pencil-square-o"></span> 修改活动</strong>
			</div>
			<div class="body-content">
				<form method="post" class="form-x" action="Pageupdate.php" enctype="multipart/form-data">
				<?php
					require_once ("../connect.php");
					$paid=$_GET['paid'];
					$ssql = "SELECT * FROM activepage where paid=$paid";
					$sresult = mysql_query($ssql);
					$srow = mysql_fetch_assoc($sresult);
					?>
					<div class="form-group">
						<div class="label">
							<label>活动名称：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="paname" value="<?php echo($srow['paname']);?>"  required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>活动大图片：</label>
						</div>
						<div class="field label" style="width: 320px;">
							<img src="../uploads/<?php echo($srow['papic']);?>"id="pic1"/>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field label" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file1"  data-file="pic" data-who="#pic1" class="button bg-blue margin-left" id="image1"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 110px;">
								尽量选择大图片
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>页面主色调：</label>
						</div>
						<div class="field">
							<input type="text" class="input" name="pacolor" value="<?php echo($srow['pacolor']);?>" required/>
							<div class="tips"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>领券图片：</label>
						</div>
						<div class="field label" style="width: 320px;">
							<img src="../uploads/<?php echo($srow['paquanpic']);?>" id="pic2"/>
						</div>
					</div>
						<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field label" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file2" data-file="pic" data-who="#pic2" class="button bg-blue margin-left" id="image2"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 110px;">
								尽量选择大图片
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>活动介绍图片：</label>
						</div>
						<div class="field label" style="width: 320px;">
							<img src="../uploads/<?php echo($srow['paapic']);?>"id="pic3"/>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field label" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" data-file="pic" data-who="#pic3" name="file3" class="button bg-blue margin-left" id="image3"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 110px;">
								尽量选择大图片
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>商品库：</label>
						</div>
						<div class="field" style="position: relative;">
							<select name="pro" multiple="" class="chooseP">
								<?php
					require_once ("../connect.php");
					$choosesql = "SELECT pname,pid,price,preferential FROM product";
					$chooseresult = mysql_query($choosesql);
					while($chooserow = mysql_fetch_assoc($chooseresult)){
					?>
								<option title="<?php echo($chooserow['pid']); ?>--><?php echo($chooserow['pname'])?>--><?php echo($chooserow['price']-$chooserow['preferential']);?>元"
									 value="<?php echo($chooserow['pid']); ?>" name="<?php echo($chooserow['pname'])?>"><?php echo($chooserow['pid']); ?>-->
									 	<?php echo($chooserow['pname'])?>--><?php echo($chooserow['price']-$chooserow['preferential']);?>元</option>
								<?php } ?>
							</select>
							<div class="aDseaver">
								<i>活动商品:</i>
								<span>全部添加》</span>
							<span>选中添加〉</span>
							<span>《全部移除</span>
							<span><选中移除</span>
							</div>
							<select name="choosepro" class="choosepro" multiple=""></select>
						<div class="isOK" style="z-index: 999;">
								<span>确定选中</span>
								<span>修改选中</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>显示区域：</label>
						</div>
						<div class="field">
							<select class="addoption" name="addoption" style="float: left; width: 80px; height: 30px;">
								<option value="1">区域1</option>
							</select>
							<a class="addBlock" onclick="addoption()">添加更多区域</a>
							<b class="addsec" style="color: red; font-size:16px; line-height:30px; text-align: center;"></b>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>标题背景图：</label>
						</div>
						<div class="field label" style="width: 320px;">
							<img src="../uploads/<?php echo($srow['patitleBagPic']);?>"id="pic4"/>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field label" style="width: 320px;">
							<a href="javascript:;" class="file">
								+ 浏览上传
								<input type="file" name="file4" data-file="pic" data-who="#pic4" class="button bg-blue margin-left" id="image4"  style="float:left;">
							</a>
							<div class="tipss" style="position: absolute; top: 10px; right: 90px;">
								尺寸：1000*100px
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>区域标题：</label>
						</div>
						<div class="field">
							<input type="text" class="input paproname1" name="paproname1" value="" placeholder="点击填入区域标题1"/>
							<input type="text" class="input paproname2" name="paproname2" value="" placeholder="点击填入区域标题2"/>
						</div>

					</div>
					<div class="form-group">
						<div class="label">
							<label>已选商品校对：</label>
						</div>
						<div class="field ischoose">
							<?php
								require_once ("../connect.php");
								$paid=$_GET['paid'];
								$whosql="select * from activepage where paid = $paid";
								$whoresult=mysql_query($whosql);
								$whorow=mysql_fetch_assoc($whoresult);
								$block = $whorow['papro'];
								$fineblock = explode(' ',$block);
								//echo count($fineblock);
								$many = "";//统计区域数
								for($index=0;$index<count($fineblock);$index++){ 
				//					echo $fineblock[$index];echo "</br>"; //小块
									$many++;
									$fineblock[$index]=substr($fineblock[$index],1,strlen($fineblock[$index])-2);  
									$$fineblock[$index]=$fineblock[$index];
//									echo $$fineblock[$index];
									$theblock = explode('[',$$fineblock[$index]); 
									$title=substr($theblock[0],0,strlen($theblock[0])-1);
//									echo $title;
									$content= explode(',',$title); 
									$title1=substr($content[1],1,strlen($content[1])-2);
									$title2=substr($content[2],1,strlen($content[2])-2);
									$pid=substr($theblock[1],0,strlen($theblock[1])-1);
							?> 
								<div class="ck">
									<p>区域<?php echo $many ?>：</p>
									<p>标题1：<name><?php echo ($title1)==""?"标题为空":$title1 ?></name></p>
									<p>标题2：<name><?php echo ($title2)==""?"标题为空":$title2 ?></name></p>
									<span>所选商品：</span>
									<select multiple>
										<?php
											$sql="select pid,pname,price,preferential from product where pid in ($pid)";
											$bresult=mysql_query($sql);
											while($brow=mysql_fetch_assoc($bresult)){
										?>
										<option title="<?php echo $brow['pid'] ?>--><?php echo $brow['pname'] ?>--><?php echo $brow['price']-$brow['preferential'] ?>元" value="<?php echo $brow['pid'] ?>" name="<?php echo $brow['pname'] ?>"><?php echo $brow['pid'] ?>--&gt;<?php echo $brow['pname'] ?>--&gt;<?php echo $brow['price']-$brow['preferential'] ?>元</option>
										<?php } ?>
									</select>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<div class="label">
							<label><!--保存生成的数据--></label>
						</div>
						<div class="field whatSale">
							<!--每一项的数据-->
							<select> </select>
							<!--所有项的数据-->
							<input type="text" name="papro" class="whatSaleAll" value=""/>
						</div>
						<!--修改时从数据库中调出，生成字段-->
						<div class="update">
							<input type="text" id="update" value="<?php echo($srow['papro']);?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label>注意：</label>
						</div>
						<div class="field">
							<div class="tips">
								<p>1、商品库显示顺序：产品序号->产品名称->产品售价；<br/>
								   2、单选或按住鼠标拖动多选，如需查看商品信息，双击可打开商品链接；<br/>
								   3、在商品库选择商品后点击"选中添加"/"全部添加"可添加到活动商品名单中，如需取消选择，可按同理操作；<br/>
								   4、点击"确定选中"商品会添加到"已选商品校对"中，如需修改，请选择"显示区域后"点击"修改选中"按钮，选中区域的商品会在"活动商品"中显示，修改完成后点击"保存修改"按钮，在"已选商品校对"完成后点击"提交"按钮。
								</p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label">
							<label></label>
						</div>
						<div class="field">
							<button class="button bg-main icon-check-square-o" type="submit">
							提交
							</button>
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
	</body>
</html>