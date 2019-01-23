<!--模态框-->
<div class="quan"></div>
<div class="mtlogin">
		<i class="icon iconfont qzy-close"></i>
		<p style="width: 100%;height: 100px;
	line-height: 100px;display: block; font-size: 16px;">
			<img src="img/logo2.png" alt="轻松购" />
			<i class="icon iconfont qzy-dian"></i>用户密码登录
		</p>
		<form action="checkuser.php" method="post">
			<div>
				<p>
				<input type="text" name="uname" class="user" placeholder="手机 / 邮箱 / 用户名" />
			</p>
			<p>
				<input type="password" name="upwd" class="user" placeholder="密码" />
			</p>
			<p>
				<input name="checkno" type="text"  class="checkno" placeholder="请输入验证码"/>
				<img src="checkno.php" alt="验证码"
				onclick="this.src='checkno.php?t='+Math.random()"/>
				
			</p>
			<p>
				<input type="checkbox" class="isyes" name="sdate" value="0" onclick="isyes();"/>保存登录7天<a href="register.php">立即注册</a>
			</p>
			<input class="loginnow" type="submit" value="登录"/>
			</div>
		</form>
</div>
<!--顶部广告/推广-->
<div id="top_main" style="display: block;height: 124px; width: 100%;"><a href="#"><img src="uploads/<?php echo($prorow['itlogo']);?>" alt="此处放网页顶部图片" title="" height="124px" width="100%"/></a></div>
<div id="header" class="clearfix">
			<!--顶部栏-->
			
			<div class="hnav_title">
				<div class="hnav_center">
					<div class="hnav_l fl">
						<a href="index.php" style="text-decoration: none;"><i class="icon iconfont qzy-home red"></i></a>
						<span id="welcome" class="c666">
							<a class="c666 pr15">欢迎来轻松购</a>
						</span>
						<span id="user" class="ml15">
							<?php
	if($_COOKIE["ckuid"]!=null&&$_COOKIE["ckuid"]>0){
		echo('<a target="_blank" href="user/userCenter.php" class="login co pr15">'.$_COOKIE["ckuname"].'，您好！</a><a href="logout.php">退出登录</a>');
	}
	else{
		echo('<a target="_blank" href="login.php" class="login co pr15">请登录</a>
							<a target="_blank" href="register.php" class="reg c666">免费注册</a>');
	}
	?>
						</span>
						<input type="hidden" id="islogin" value="<?php echo($_COOKIE["ckuid"]);?>" />
					</div>
					<div class="hnav_r">
						<ul class="person_new fl tn">
							<li><a target="_blank" href="index.php">商城首页</a></li>
							<li><a target="_blank" href="user/userCenter.php">个人中心</a></li>
							<li><a target="_blank" href="cart.php">购物车</a></li>
							<li><a target="_blank" href="orderlist.php">我的订单</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="hmain_center clearfix h200 pr bafff">
				<div class="logo bac pt15">
					<?php 
						$path = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
						$file = basename($path);
						if($file!="index.php"){echo '<a target="_blank" href="index.php" >';}else{echo '<a href="javascript:;">';}
					?><img src="uploads/<?php echo($prorow['ilogo']);?>" alt="网页logo" title="轻松购-http://qzy.is-great.net" height="90"/></a>
				</div>
				<!--搜索框-->
				<div class="search pa">
						<div class="search_form">
							<div class="search_title fl">
								<input type="text" name="skey" class="skey search_pro w390" placeholder="<?php echo($prorow['iseacsh']);?>" />
							</div>
							<button type="submit" class="searchbt search_bt zt h40 ba">
								<?php 
								$path = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
								$file = basename($path);
								if($file=="index.php"){echo '<a target="_blank">搜索</a>';}else{echo '<a>搜索</a>';}
								?>
								</button>
					</div>
					<div class="search_push">
						<ul class="push_pro fl tn">
							<li class="fl fb pr15 c666">热品推荐:</li>
							<?php
								require_once("connect.php");
									$rsql="SELECT ccconame FROM product INNER JOIN ccclassification ON 
									pclassification = cccoid WHERE phot =1 order by rand()";
									$rresult=mysql_query($rsql);
									while($rrow=mysql_fetch_assoc($rresult)){ ?>
										<li><a target="_blank" href="goodslist.php?class3=<?php echo($rrow['ccconame']);?>"><?php echo($rrow['ccconame']);?></a></li>
									<?php }?>
						</ul>
					</div>
				</div>
				<div class="header-banner mt40 pa">
					<ul class="fl">
						<li><a><i class="icon iconfont qzy-1 red"></i>一站式购齐</a></li>
						<li><a><i class="icon iconfont qzy-88 red fb"></i>满88包邮</a></li>
						<li><a><img src="img/header-banner3.png"></a></li>
						<li><a><img src="img/header-banner4.png"></a></li>
					</ul>
				</div>
				<!--商品分类-->
				<div class="allproduct h40 ba">
					<div class="allpro ba cofff f16 cp">
						<i class="icon iconfont qzy-lable"></i>所有产品分类
					</div>
					<div class="finepro cofff">
						<ul class="prolist">
							<?php
							$psql="select * from classification order by cosort limit 0,8";
							$presult=mysql_query($psql);
							while($prow=mysql_fetch_assoc($presult)){
								$coid=$prow['coid'];
							?>
							<li class="cb">
								<h3 class="zt f16"><a target="_blank" href="goodslist.php?class1=<?php echo($prow['coname']);?>"><?php echo($prow['coname']);?></a></h3>
								<div class="fine_pro">
									<?php
									$ptsql="SELECT * FROM classification INNER JOIN cclassification 
									ON cosort = ccosort WHERE ccosort = $coid";
									$ptresult=mysql_query($ptsql);
									while($ptrow=mysql_fetch_assoc($ptresult)){
										$ccoid=$ptrow['ccoid'];
										$ccosort=$ptrow['ccosort'];
										?>
									<a class="cee op05" target="_blank" href="goodslist.php?class2=<?php echo($ptrow['cconame']);?>"><?php echo($ptrow['cconame']);?></a>
									<?php }?>
								</div>
								<div class="fine_pro1">
									<?php
										$ptsql="SELECT * FROM classification INNER JOIN cclassification 
										ON cosort = ccosort WHERE ccosort = $coid limit 0,7";
										$ptresult=mysql_query($ptsql);
										while($ptrow=mysql_fetch_assoc($ptresult)){
											$ccoid=$ptrow['ccoid'];
									?>
									<dl style="float: left; width: 100%;">
									<dt class="f12 fl cp"><?php echo $ptrow['cconame'];?><i class="icon 									iconfont qzy-jiantouyou"></i></dt>
									<dd class="fl">
										<?php
											$pqsql="SELECT * FROM cclassification INNER JOIN 											ccclassification ON ccoid = cccosort WHERE cccosort = 											$ccoid order by rand()";
											$pqresult=mysql_query($pqsql);
											while($pqrow=mysql_fetch_assoc($pqresult)){
										?>
										<a class="c333 tc" target="_blank" href="goodslist.php?class3=<?php echo($pqrow['ccconame']);?>"><?php echo($pqrow['ccconame']);?></a>
										<?php }?>
									</dd> 
									<br />
									<?php }?>
								</div>
							</li>
						<?php
					   }
						?>
						</ul>
					</div>
				</div>
				<div class="main-hnav pa mt10 bafff">
					<ul>
						<li class="fl lhh40 h40 f16 pc20"><a href="index.php" class="c666 fb tdn">首页</a></li>
						
						
						<?php
							$nsql="select * from classification order by cosort limit 0,5";
							$nresult=mysql_query($nsql);
							while($nrow=mysql_fetch_assoc($nresult)){
							?>
						<li class="fl lhh40 h40 f16 pc20"><a class="c666 fb tdn" target="_blank" href="goodslist.php?class1=<?php echo($nrow['coname']);?>"><?php echo($nrow['coname']);?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="hnav_cart mt7 pa cp">
					<div class="cartlogo">
						<a target="_blank" href="cart.php"><i class="icon iconfont qzy-gouwuche"></i></a>
					</div>
					<div class="cart ba">
						<strong class="f20 fb lhh40"><s class="fl ml10 tdn">
							<?php
							if($_COOKIE["ckuid"]!=null&&$_COOKIE["ckuid"]>0){ 
								$uid = $_COOKIE["ckuid"];
								?>
							<?php
					$sql="select price,preferential,cnum from cart inner join product on pid=cpid where cuid=$uid";
					$result=mysql_query($sql);
					$num=0;
					$sum=0;
					while($row=mysql_fetch_assoc($result)){
						$price=$row['price']-$row['preferential'];
						$match=$row['cnum'];
						$num+=$price*$match;//商品总价
						$sum+=$match;//商品数量
				?>
				<?php } ?>
					¥<?php echo $num; ?>
						</s><i class="i f12">元</i></strong>
						<i class="i cofff f14 db lhh40">(<?php echo $sum;?>件)</i>
	<?php }else{?>
		¥0.00
		</s><i class="i f12">元</i></strong>
						<i class="i cofff f14 db lhh40">(0件)</i>
	<?php }
	?>
						<s class="arrow pa"></s>
						<div class="cart_pro">
						<ol>
							<li>商品</li>
							<li>数量</li>
							<li>价格</li>
							<li>删除</li>
						</ol>
							<?php
	if($_COOKIE["ckuid"]!=null&&$_COOKIE["ckuid"]>0){ 
		$uid = $_COOKIE["ckuid"];
		?>
		<div class="shop">
			<table>
				<?php
					$sql="select pid,pname,ppic,price,preferential,cnum,cid from cart inner join product on pid=cpid where cuid=$uid";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result)){
						$price=$row['price']-$row['preferential'];
				?>
				<tr>
					<td><a target="_blank" title="<?php echo($row['pname']); ?>" href="product.php?pid=<?php echo($row['pid']); ?>"><img height="40" src="uploads/<?php echo($row['ppic']); ?>" alt="<?php echo($row['pname']); ?>"/></a></td>
					<td><a class="dayuyi" href="subtractcart.php?pid=<?php echo($row['pid']); ?>&&num=1&&pag=home"><i class="icon iconfont qzy-jian"></i></a><input type="text" class="pnum" placeholder="数量" value="<?php echo($row['cnum']); ?>" /><a href="addcart.php?pid=<?php echo($row['pid']); ?>&&num=1"><i class="icon iconfont qzy-jia" onclick="loginnow();"></i></a></td>
					<td>￥<?php echo number_format($price,2); ?></td>
					<td><a href="deletecart.php?pid=<?php echo($row['pid']);?>&&pag=home">删除</a></td>
				</tr>
				<?php } ?>
					</table>
	</div>
	<div class="index_cart">
		<p>合计:<strong>￥<?php echo $num; ?> </strong>（含优惠）</p>
	<p><a href="cart.php">去结算</a></p>
	</div>
	
	<?php }else{?>
		<div class="buy mt30"><p>如果您还未登录，可能导致购物车为空，请
		<a target="_blank" onclick="loginnow ()">马上登录</a></p></div>
	<?php }
	?>
						
					</div>
					</div>
					
				</div>
			</div>
		</div>