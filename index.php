<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php
			require_once ("connect.php");
			$prosql = "select * from information where inid=1";
			$proresult = mysql_query($prosql);
			$prorow = mysql_fetch_assoc($proresult);
		?>
		<title>轻松购<?php echo $prorow['ititle']; ?></title>
		<link rel="icon" href="img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/general.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
		<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_list.js" type="text/javascript" charset="utf-8"></script><!--分类列表-->
		<script src="js/index_banner.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_pphd.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_newPro.js" type="text/javascript" charset="utf-8"></script><!--新品推荐-->
		<script src="js/index_newproduct.js" type="text/javascript" charset="utf-8"></script><!--分类新品推荐-->
		<script src="js/index_position.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script><!--模态框登录-->
	</head>
	<body>
		<?php require_once ("header_index.php");?>
		<div id="main">
			<div id="banner">
				<ul class="bannerlist">
					<?php
						$sql="select * from banner where bpic !='' order by bsort limit 0,8";
						$bresult=mysql_query($sql);
						while($brow=mysql_fetch_assoc($bresult)){ ?>
						<li><a target="_blank" href="<?php echo($brow['burl']); ?>"><img class="bannerpic" title="<?php echo($brow['bname']); ?>" src="uploads/<?php echo($brow['bpic']); ?>"/></a></li>
					<?php } ?>
				</ul>
				<span class="pre">pre</span>
				<span class="next">next</span>
				<ul class="bannernav"></ul>
				<div class="user_information pa bafff op09">
					<div class="userMain bb1 h80">
						<a class="tx br db w60 fl" <?php
								if($uid!=null&&$uid>0){echo('target="_blank" href="user/userCenter.php"');}
								else{echo 'onclick="loginnow ();"';}?>><i class="icon iconfont qzy-huiyuanzhongxin"></i></a>
						<p class="nickname w140 pl10 h18 oh pt10 db fl">Hi，欢迎来轻松购</p>
						<?php
						    if($uid!=null&&$uid>0){
						        echo('<p class="loginOrRegister w140 pl10 h18 oh pt10 db fl"><a class="pr15" href="">'.$_COOKIE["ckuname"].'</a><a href="logout.php">注销</a></p>');
						    }
						    else{
						        echo('<p class="loginOrRegister w140 pl10 h18 oh pt10 db fl"><a class="pr15 "  href="javascript:;" onclick="loginnow ()">登录</a><a target="_blank" href="register.php">注册</a></p>');
						    }
					    ?>
					</div>
					<div class="news bb1">
						<div class="newsMain m10 h40 lhh40 bb1 f16">
							<i class="mr10 mt1 i">
								<i class="icon iconfont qzy-mulu red" style="font-weight: bolder; font-size: 20px;"></i></i>公告
								<a class="more fr f14" target="_blank" href="newslist.php">更多</a>
						</div>
						<div class="newFine ml10 mr10 news">
							<ul>
								<?php
									$npsql = "select * from news order by nread LIMIT 0,1";
									$npresult = mysql_query($npsql);
									while($nprow = mysql_fetch_assoc($npresult)){
								?>
								<li>
									<a class="fb" target="_blank" title="<?php echo($nprow['nname']); ?>" href="news.php?nid=<?php echo($nprow['nid']); ?>">
										<font style="color:#FF0000;"><?php echo($nprow['nname']); ?></font>
									</a>
								</li>
								<?php } ?>
								<?php
									$npsql = "select * from news order by nread LIMIT 1,4";
									$npresult = mysql_query($npsql);
									while($nprow = mysql_fetch_assoc($npresult)){
								?>
								<li>
									<a target="_blank" title="<?php echo($nprow['nname']); ?>" href="news.php?nid=<?php echo($nprow['nid']); ?>"><?php echo($nprow['nname']); ?></a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="serviceMain">
						<ul>
							<li><a target="_blank" href="#"><i class="icon iconfont qzy-huiyuanzhongxin1"></i><span>会员中心</span></a></li>
							<li><a target="_blank" href="#"><i class="icon iconfont qzy-shezhi"></i><span>资料设置</span></a></li>
							<li><a target="_blank" href="#"><i class="icon iconfont qzy-xiaoxi"></i><span>我的消息</span></a></li>
							<li>
							<?php
								if($uid!=null&&$uid>0){echo(' <a target="_blank" href="orderlist.php">');}
								else{echo('<a onclick="loginnow ()">');}
							?>
								<i class="icon iconfont qzy-dingdan"></i><span>我的订单</span></a></li>
							<li><a target="_blank" href="#"><i class="icon iconfont qzy-youhuiquan"></i><span>领优惠券</span></a></li>
							<li><a target="_blank" href="#"><i class="icon iconfont qzy-icon4"></i><span>商品收藏</span></a></li>
						</ul>
					</div>
					</div>
				</div>
				<div id="pphd" class="mian pphd clearfix">
					<h3 class="fl f24 c333 lhh50">团购活动</h3>
				<div id="pphd2">
					<ul>
						<?php
							$phsql="select pid,pname,ppic,price,preferential,pcheck from product where ptuan=1 and ppic !='' order by rand() limit 0,20";
							$phresult=mysql_query($phsql);
							while($phrow=mysql_fetch_assoc($phresult)){
							?>
							<li style="position: relative;">
								<div class="position"> 
									<div class="tuan-pro-top" >
										<h4 class="f14 c666"><?php echo($phrow['pname']); ?></h4>
										<div class="price">￥<em><?php echo($phrow['price'] - $phrow['preferential']); ?>元</em></div>
										<div class="time" data-endtime = "<?php echo($phrow['pcheck']); ?>">剩余：<em><span class="red-color">*</span>天<span class="red-color">*</span>小时<span class="red-color">*</span>分<span class="red-color">*</span>秒</em></div>
										<div class="tuan-pro-pic"><img src="uploads/<?php echo($phrow['ppic']); ?>"  width="120" height="120" alt="<?php echo($phrow['pname']); ?>"/></div>
									</div>
									<div class="tuan-pro-bottom">
										<div class="tuan-pro-pic1"><img src="uploads/<?php echo($phrow['ppic']); ?>" alt="<?php echo($phrow['pname']); ?>" title="<?php echo($phrow['pname']); ?>"/></div>
										<div class="pro-price">
											<h4 title="<?php echo($phrow['pname']); ?>"><?php echo($phrow['pname']); ?></h4>
											<div class="price">团购价：<span class="red-color">¥<?php echo($phrow['price'] - $phrow['preferential']); ?>元</span></div>
											<a target="_blank" href="product.php?pid=<?php echo($phrow['pid']); ?>" target="_blank">查看详情</a>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div id="pphd1">
					<ul></ul>
				</div>
			</div>
			<div class="main_ba clearfix baf7f7f7 pt30 pb40">
			<div id="newPush" class="mian newPush bafff">
				<div class="newTop baf7f7f7 h50">
					<h3 class="fl f24 c333">新品推荐</h3>
					<div class="fr display">
						<input type="button" class="newprolast" value="<" />
						<input type="button" class="newpronext" value=">" />
					</div>
				</div>
				<div class="newMain pphd cb clearfix">
					<ul class="newPro clearfix">
						<?php
							$pnsql="SELECT pid,pname,ccconame,price,ppic,cconame,coname FROM product 
									INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN
									cclassification ON ccoid = cccosort INNER JOIN classification ON
									coid = ccosort where pnew=1 and ppic !='' order by rand() limit 0,20";
							$pnresult=mysql_query($pnsql);
							while($pnrow=mysql_fetch_assoc($pnresult)){
							?>
						<li class="fl">
							<div>
							<a target="_blank" href="product.php?pid=<?php echo($pnrow['pid']); ?>" title="<?php echo($pnrow['pname']); ?> <?php echo($pnrow['ccconame']); ?> <?php echo($pnrow['cconame']); ?> <?php echo($pnrow['coname']); ?>"target="_blank"><img src="uploads/<?php echo($pnrow['ppic']); ?>" width="140"  class="pt20" /></a></div>
							<h4 title="<?php echo($pnrow['pname']); ?> <?php echo($pnrow['ccconame']); ?> <?php echo($pnrow['cconame']); ?> <?php echo($pnrow['coname']); ?>"target="_blank"><?php echo($pnrow['pname']); ?> <?php echo($pnrow['ccconame']); ?></h4>
							<span class="db tc red">￥<?php echo($pnrow['price']); ?></span>
						</li><?php } ?>
					</ul>
				</div>
			</div>
			</div>
			<div class="mian clearfix">
				<?php
					$classfsql="SELECT * FROM classblock order by cBcoid";
					$classfresult=mysql_query($classfsql);
					while($classfrow=mysql_fetch_assoc($classfresult)){
						$cclassid=$classfrow['cBcoid'];
						$cclasscolor=$classfrow['cBcolor'];
						$cclasstitle1=$classfrow['cBtitle1'];
						$cclasstitle2=$classfrow['cBtitle2'];
						$cclasspic=$classfrow['cBpic'];
				?>
				<div class="profloor pphd clearfix" id="profloor<?php echo($cclassid) ?>">
					<div class="proTop">
						<h2 class="proclass">
							<?php
							$cnamesql = "SELECT * FROM classification WHERE coid =$cclassid";
							$cnameresult = mysql_query($cnamesql);
							$cnamerow = mysql_fetch_assoc($cnameresult);
							?>
							<span class="floor-num" floor_name="<?php echo($cnamerow['coname']); ?>"><?php echo($cclassid) ?>F</span>
							<a class="floor-name" ><?php echo($cnamerow['coname']); ?></a>
							<input type="hidden" class="floornum" value="<?php echo($cclassid) ?>" />
						</h2>
						<ul class="tab">
							<li class="greatpush" name="<?php echo($cclassid) ?>">爆款推荐</li>
							<li class="newpro" name="<?php echo($cclassid) ?>">新品上架</li>
						</ul>
						<ol class="subcate">
							<?php
								$classsql="SELECT * FROM classification INNER JOIN cclassification ON cosort = ccosort
										WHERE ccosort = $cclassid order by ckcosort limit 0,8";
								$classresult=mysql_query($classsql);
								while($classrow=mysql_fetch_assoc($classresult)){
							?>
							<li><a target="_blank" href="goodslist.php?class2=<?php echo($classrow['cconame']);?>"><?php echo($classrow['cconame']);?></a></li>
							<?php } ?>
						</ol>
					</div>
					<div class="proMain">
						<div class="proClassFine clearfix">
							<div class="proImg" style="background-color:<?php echo($cclasscolor) ?>;">
								<h2><?php echo($cclasstitle1) ?></h2>
								<span><?php echo($cclasstitle2) ?></span>
								<img src="uploads/<?php echo($cclasspic) ?>"/>
							</div>
							<div class="proFine">
								<?php
							$pro1sql="SELECT ccconame FROM product INNER JOIN ccclassification ON pclassification = 
									cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = 
									ccosort WHERE coid = $cclassid and ppic !='' order by rand() limit 0,9";
							$pro1result=mysql_query($pro1sql);
							while($pro1row=mysql_fetch_assoc($pro1result)){
							?>
							<span style="background-color:<?php echo($cclasscolor) ?>;"><a target="_blank" href="goodslist.php?class3=<?php echo($pro1row['ccconame']);?>"><?php echo($pro1row['ccconame']);?></a></span><?php } ?>
							</div>
						</div>
						<div class="productMain productMainpush clearfix">
							<ul>
								<?php
									$pro2sql="SELECT * FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort WHERE coid=$cclassid and phot=1 order by rand() limit 0,8";
									$pro2result=mysql_query($pro2sql);
									while($pro2row=mysql_fetch_assoc($pro2result)){
								?>
							<li>
								<a target="_blank" title="<?php echo($pro2row['pname']); ?>" href="product.php?pid=<?php echo($pro2row['pid']); ?>">
									<img src="uploads/<?php echo($pro2row['ppic']); ?>"/>
								</a>
								<h4 title="<?php echo($pro2row['pname']); ?>"><?php echo($pro2row['pname']); ?></h4>
								<span class="db pl20 red">￥<?php echo($pro2row['price']-$pro2row['preferential']); ?></span>
								<?php 
									if($_COOKIE["ckuid"]!=null&&$_COOKIE["ckuid"]>0){
										?>
						        <a href="addcart.php?pid=<?php echo($pro2row['pid']); ?>&num=1"
						        	<?php
						    }else{?>
						    	<a href="javascript:;"
						  <?php  }?>
									><button <?php
								if($uid==""){echo(' onclick="loginnow();"');}?>><i title="点击加入购物车" class="icon iconfont qzy-qzycart"></i></button></a>
							</li>
							<?php } ?>
							</ul>
						</div>
						<div class="productMain productMainnew clearfix">
							<ul>
								<?php
							$prosql="SELECT * FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification 
									ON coid = ccosort WHERE coid =$cclassid and pnew=1 order by rand() limit 0,8";
							$proresult=mysql_query($prosql);
							while($prorow=mysql_fetch_assoc($proresult)){
							?>
							<li>
								<a target="_blank" title="<?php echo($prorow['pname']); ?>" href="product.php?pid=<?php echo($prorow['pid']); ?>">
									<img src="uploads/<?php echo($prorow['ppic']); ?>"/>
								</a>
								<h4 title="<?php echo($prorow['pname']); ?>"><?php echo($prorow['pname']); ?></h4>
								<span class="db pl20 red">￥<?php echo($prorow['price']-$prorow['preferential']); ?></span>
									<?php 
									if($_COOKIE["ckuid"]!=null&&$_COOKIE["ckuid"]>0){
										?>
						        <a href="addcart.php?pid=<?php echo($prorow['pid']); ?>&num=1">
						        	<?php
						    }else{?>
						    	<a href="javascript:;">
						  <?php  }?>
						    <button
						    	<?php
								if($uid==""){echo(' onclick="loginnow();"');}?>
						    	
						    	><i title="点击加入购物车" class="icon iconfont qzy-qzycart"></i></button></a>
							</li><?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="left_show">
				<ul>
					<li><a href='#pphd'>团购活动</a><span>></span></li>
					<li><a href='#newPush'>新品推荐</a><span>></span></li>
				</ul>
				<div class="ewmimg clearfix">
					<img src="img/pagesewm.png"/>
				</div>
				<div class="breakTop"><a title="返回顶部" href="">返回顶部</a></div>
			</div>
		</div>
		<?php
		require_once ("footer.php");
		?>
	</body>
</html>