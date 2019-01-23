<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<?php
				require_once ("connect.php");
				$paid=$_GET['paid'];
				$whosql="select * from activepage where paid = $paid";
				$whoresult=mysql_query($whosql);
				$whorow=mysql_fetch_assoc($whoresult);
				$paid=$whorow['paid'];
				if($paid==""){
					header("location:index.php");
				}
				$block = $whorow['papro'];
				$Bgpic = $whorow['patitleBagPic'];
//				echo ($block);//整块
				$fineblock = explode(' ',$block); 
				$many = "";//统计区域数
				for($index=0;$index<count($fineblock);$index++) 
				{ 
//					echo $fineblock[$index];echo "</br>"; //小块
					$many++;
					$fineblock[$index]=substr($fineblock[$index],1,strlen($fineblock[$index])-2);  
					$$fineblock[$index]=$fineblock[$index];
				}
				
			?> 
		<title><?php echo($whorow['paname']); ?>-轻松购_http://nhic.is-great.org_上轻松购，购轻松！</title>
		<link rel="icon" href="img/nhic.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
		<link rel="stylesheet" type="text/css" href="css/header_pages.css"/>
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/><!--字体图标-->
		<link rel="stylesheet" type="text/css" href="css/qzy01.css"/>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/limit.js" type="text/javascript" charset="utf-8"></script><!--限制文本获取，复制-->
		<!--<script src="js/page.js" type="text/javascript" charset="utf-8"></script>-->
		<script src="js/pages.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.logo{ text-align: left;}
		</style>
	</head>
	<body>
		<?php
		require_once("header2.php");
		?>
		</div>
		<div id="main clearfix">
			<div class="top clearfix" style="background: url(uploads/<?php echo($whorow['papic']); ?>) <?php echo($whorow['pacolor']); ?> no-repeat 50% 0;">
				
				<div class="quan1 clearfix">
					<img data-true = "<?php echo($whorow['paquanpic']); ?>" src="uploads/<?php echo($whorow['paquanpic']); ?>"/>
				</div>
				<div class="active clearfix">
					<img data-true = "<?php echo($whorow['paapic']); ?>" src="uploads/<?php echo($whorow['paapic']); ?>"/>
				</div>
				<div id="proSale01" class="proSale01 clearfix">
					<ul>
					<?php
						$theblock = explode('[',$$fineblock[0]); 
						$pid=substr($theblock[1],0,strlen($theblock[1])-1);
						$sql="select pid,pname,price,preferential,ppic from product where pid in ($pid)";
						$bresult=mysql_query($sql);
						while($brow=mysql_fetch_assoc($bresult)){
							$bid=$brow['pid'];
							$q1sql="SELECT onum FROM `oitems` WHERE opid = $bid";
							$q1result=mysql_query($q1sql);
							$salenum1 =0;
							while($q1row=mysql_fetch_assoc($q1result)){
							$salenum1+=$q1row['onum'];
							}
					?>
					<li><a target="_blank" href="product.php?pid=<?php echo($bid); ?>">
						<div class="pro_sale">
							<div class="proImg1">
								<img src="uploads/<?php echo($brow['ppic']); ?>"/>
							</div>
							<div class="proTitle01">
								<h3><?php echo($brow['pname']); ?></h3>
								<p>满119减20再送30</p>
								<div class="price-box">
									<p class="pro-price">
										¥<?php echo($brow['price']-$brow['preferential']); ?>
									</p>
									<span class="price-title">已销<?php echo $salenum1 ;?>件</span>
								</div>
								<div class="bottom-area">
									<button class="cart">
									加购物车<i class="icon iconfont qzy-cart"></i>
									</button>
								</div>
							</div>
						</div>
					</a></li>
					<?php }?>
					</ul>	
				</div>
				<?php
					for ($where = 2; $where <= $many; $where++) {
					}
				?>
				<?php 
				$where = 2;
				while($where<$many) {
					$theblock = explode('[',$$fineblock[$where]); 
					$title=substr($theblock[0],0,strlen($theblock[0])-1);
					$content= explode(',',$title); 
					$title1=substr($content[1],1,strlen($content[1])-2);
					$title2=substr($content[2],1,strlen($content[2])-2);
					$pid=substr($theblock[1],0,strlen($theblock[1])-1);
					?>
				   <div id="proSale0<?php  echo $where ?>" class="proSale02 clearfix">
					<div class="proImg2" style="background: url(uploads/<?php  echo $Bgpic ?>);">
						<img class="SaleImg" style="display: none;" src="uploads/<?php  echo $Bgpic ?>">
						<?php if($title2==""){?>
							<h3 class="da1"><?php echo $title1 ?></h3>
						<?php }else{?>
							<h3><?php echo $title1 ?></h3>
							<p><?php echo $title2 ?></p>
						<?php }?>
					</div>
					<div class="auto sale clearfix">
						<ul>
							<?php
								$psql="select pid,pname,price,preferential,ppic from product where pid in ($pid)";
								$psult=mysql_query($psql);
								while($prow=mysql_fetch_assoc($psult)){
									$pid=$prow['pid'];
									$qsql="SELECT onum FROM `oitems` WHERE opid = $pid";
									$qresult=mysql_query($qsql);
									$salenum = 0;
									while($qrow=mysql_fetch_assoc($qresult)){
									$salenum+=$qrow['onum'];
									}
							?>
							<li>
								<a target="_blank" href="product.php?pid=<?php echo($prow['pid']); ?>">
									<img src="uploads/<?php echo($prow['ppic']); ?>"/>
										<i><?php echo $title1 ?></i>
										<i><?php echo $title2 ?></i>
									<h4><?php echo($prow['pname']); ?></h4>
									<span>销量：<?php echo $salenum;?>件</span>
									<em><pre>活动价：</pre><b>￥<?php echo($prow['price']); ?></b></em>
									<button><i title="点击加入购物车" class="icon iconfont qzy-qzycart"></i></button>
								</a>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
				<?php
				   $where++;
				} 
				?> 
			</div>
			<div class="right_show">
						<div class="ewmimg clearfix">
							<img src="img/pagesewm.png"/>
						</div>
						<ul id="blockul">
							<li><i class="icon iconfont qzy-dingwei1"></i><a href="#proSale01">爆款推荐</a></li>
						</ul>
						<div class="breakTop"><a href="" title="返回顶部">返回顶部</a></div>
					</div>
		</div>
		<?php 
			require_once("footer.php");
		?>
	</body>
</html>
