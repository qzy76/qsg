<?php require_once("islogin.php");?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品评价_轻松购，购轻松</title>
		<link type="text/css" href="css/pingjia.css" rel="stylesheet" />
		<link rel="icon" href="img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/pingjia.js"></script>
		<style type="text/css">
			.dn{display: none;width: 100px;height: 100px;border: 1px solid #dddddd;}
		</style>
	</head>
	<body>
		<?php 
			require_once("connect.php");
			$uid=$_COOKIE['ckuid'];
			$oid = intval($_GET['oid']);
			if($oid==null){
				js_go("请按正确方式打开！","index.php");
			}
			$sql="SELECT pid, pname, ppic, price, preferential, pinventory, odate, ostate FROM orders INNER JOIN oitems ON orders.oid = oitems.oiid INNER JOIN product ON pid = oitems.opid WHERE orders.oid ='$oid' AND ouid ='$uid' ORDER BY pid";
			$result=mysql_query($sql);
			$sql2="SELECT COUNT(*) as buynum FROM orders INNER JOIN oitems ON orders.ouid = oitems.ouuid WHERE orders.oid =$oid";
			$result2=mysql_query($sql2);
			$row2=mysql_fetch_assoc($result2);
			$buynum = $row2['buynum'];//本单购买的商品数量
			$i=0;
			while($row1=mysql_fetch_assoc($result)){
				if($row1['ostate']!=3){
					js_back("请勿重复评价！");
				}
				$pid=$row1['pid'];
				$time = $row1['odate'];
				$year=((int)substr($time,0,4));
				$month=((int)substr($time,5,2));
				$day=((int)substr($time,8,2));
				$sql3="SELECT onum FROM `oitems` WHERE opid = $pid";
				$result3=mysql_query($sql3);
				$salenum1 =0;
					while($row3=mysql_fetch_assoc($result3)){
						$salenum1+=$row3['onum'];//本产品的购买数量
					}
					$i++;
			if($i==1){
			?>
		<div class="ping_right">
			<div class="pingjia">
				<div class="ping_pic">
					<img src="uploads/<?php echo $row1['ppic']?>" width="400" height="400" />
				</div>
				<div class="ping_proname">
					<h2><?php echo $row1['pname']?></h2>
					<ul>
						<li><span>价格</span>
							<span><i><?php echo $row1['price']-$row1['preferential']?></i>&nbsp;元</span></li>
						<li><span></span>销量</dt>
							<span></span><i><?php echo $salenum1 ?></i>件</dd>
						</li>
					</ul>
					<div class="ts">
						<div class="tishi"><s>☞</s><span>现在查看的是您所购买商品的信息于<?php echo $year ?>年<?php echo $month ?>月<?php echo $day ?>日   下单购买了此商品</span></div>
					</div>
				</div>
			</div>
			<div class="pj">
				<div class="pingjia1">
					<h3>其他买家需要你的评价~</h3>
				<form method="post" class="form-x" action="addpingjia.php" enctype="multipart/form-data">
				<div class="pingtitle" style="position: relative;">
					<span class="t1">评价商品</span>
					<span class="t2">图片</span>
					<textarea class="pingt" name="etitle[<?php echo $row1["pid"];?>]" autofocus></textarea>
					<div class="pingt1">
						<div class="filePic">
							<input type="file" name="file<?php echo $row1["pid"];?>" data-file="pic" data-who="#pic<?php echo $row1["pid"]; ?>" class="inputPic">
							<i><s><b>+</b></s></i><span>0/5</span><img src="" id="pic<?php echo $row1["pid"]; ?>" class="dn"/>
						</div>
					</div>
				</div>
				<div class="pingstar">
					<div class="xzw_starSys">
						<div class="xzw_starBox stars">
							<i class="icon iconfont qzy-start" data-title = "1"></i>
							<i class="icon iconfont qzy-start" data-title = "2"></i>
							<i class="icon iconfont qzy-start" data-title = "3"></i>
							<i class="icon iconfont qzy-start" data-title = "4"></i>
							<i class="icon iconfont qzy-start" data-title = "5"></i>
							<b></b>
						</div>
						<input type="hidden" name="star[<?php echo $row1["pid"];?>]" class="ssss" value="" />
							<input type="hidden" name="oid" value="<?php echo $oid?>"/>		
						<div class="prompt"><i>*</i>请为商品打星</div>
					</div>
				</div>
				<div class="clear"></div>
				<p class="moresp"><b>同一包裹，顺便评评呗~</b><i></i></p>
				<?php }else{?>
				<div class="pingjia1">
					<div class="sp">
						<img src="uploads/<?php echo $row1['ppic']?>" width="100" height="100" />
						<h5><?php echo $row1['pname']?></h5>
						<p>销量：<?php echo $salenum1 ?>件</p>
					</div>
				<div class="pingtitle" style="position: relative;">
					<span class="t1">评价商品</span>
					<span class="t2">图片</span>
					<textarea class="pingt" name="etitle[<?php echo $row1["pid"];?>]" ></textarea>
					<div class="pingt1">
						<div class="filePic">
							<input type="file" name="file<?php echo $row1["pid"];?>" data-file="pic" data-who="#pic<?php echo $row1["pid"]; ?>" class="inputPic">
							<i><s><b>+</b></s></i><span>0/5</span><img src="" id="pic<?php echo $row1["pid"]; ?>" class="dn"/>
						</div>
					</div>
				</div>
				<div class="pingstar">
					<div class="xzw_starSys">
						<div class="xzw_starBox stars">
							<i class="icon iconfont qzy-start" data-title = "1"></i>
							<i class="icon iconfont qzy-start" data-title = "2"></i>
							<i class="icon iconfont qzy-start" data-title = "3"></i>
							<i class="icon iconfont qzy-start" data-title = "4"></i>
							<i class="icon iconfont qzy-start" data-title = "5"></i>
							<b></b>
						</div>
						<input type="hidden" name="star[<?php echo $row1["pid"];?>]" class="ssss"/>	
						<div class="prompt"><i>*</i>请为商品打星</div>
					</div>
				</div>
				<div class="clear"></div>
				<?php }} ?>
				<div class="button">
					<button type="submit"> 提交评价</button>
				</div>
				</form>
			</div>
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
			$('body').on("change",'[data-file="pic"]',function() {
				$(this).siblings('img').show();
			});
		</script>
	</body>
</html>