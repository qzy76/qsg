<div class="quan"></div>
<div class="mtlogin">
		<i class="icon iconfont qzy-close"></i>
		<p style="width: 100%;height: 100px;
	line-height: 100px;display: block; font-size: 16px;">
			<img src="../img/logo2.png" alt="轻松购" />
			<i class="icon iconfont qzy-dian"></i>用户密码登录
		</p>
		<form action="../checkuser1.php" method="post">
			<?php 
				$path = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
				$file = basename($path);
			?>
			<input type="hidden" name="page" value="<?php echo $file;?>"id="gowhere" />
			<div>
				<p>
				<input type="text" name="uname" class="user" placeholder="手机 / 邮箱 / 用户名" value="qzy"/>
			</p>
			<p>
				<input type="password" name="upwd" class="user upwd" placeholder="密码" value="qzy123" />
			</p>
			<p>
				<input name="checkno" type="text"  class="checkno" placeholder="请输入验证码"/>
				<img src="../checkno.php" alt="验证码"
				onclick="this.src='<?php if($file!="getpass.php"){echo '../';}?>checkno.php?t='+Math.random()"/>
				
			</p>
			<p>
				<input type="checkbox" class="isyes" name="sdate" value="0" onclick="isyes();"/>保存登录7天<a href="register.php">立即注册</a>
			</p>
			<input class="loginnow" type="submit" value="登录"/>
			</div>
		</form>
</div>
<div id="header" class="clearfix" style="height: 150px;">
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
								$uid=$_COOKIE['ckuid'];
								if($uid!=null&&$uid>0){?>
									<a target="_blank" href="user/userCenter.php" class="login co pr15"><?php echo $_COOKIE['ckuname'];?>，您好！</a><a href="<?php if(strpos($path,'user/') !== false){echo '../';} ?>logout.php?page=<?php echo $file;?>">退出登录</a>
								<?php }else{?>
								<a target="_blank" onclick="loginnow();" class="login co pr15">请登录</a>
										<a target="_blank" href="register.php" class="reg c666">免费注册</a>
								<?php }?>
						</span>
						<input type="hidden" id="islogin" value="<?php echo $uid;?>" />
					</div>
					<div class="hnav_r">
						<ul class="person_new fl tn">
							<li><a class="aba" <?php if($file!="index.php"&$file!="Graduationproject"){echo(' target="_blank" href="../index.php"');}?>>商城首页</a></li>
							<li><a class="aba" target="_blank" <?php if($uid!=null&&$uid>0){echo('href="userCenter.php"');}else{echo('onclick="loginnow ()" data-comeBack="user/userCenter.php"');}?>>个人中心</a></li>
							<li><a class="aba" target="_blank" <?php if($uid!=null&&$uid>0){echo('href="../cart.php"');}else{echo('onclick="loginnow ()" data-comeBack="cart.php"');}?>>购物车</a></li>
							<li><a class="aba" target="_blank" <?php if($uid!=null&&$uid>0){echo('href="../orderlist.php"');}else{echo('onclick="loginnow ()" data-comeBack="orderlist.php"');}?>>我的订单</a></li>
						</ul>
					</div>
				<div class="logo bac pt50">
					<?php
						if($file!="getpass.php"){
							require_once ("../connect.php");
						}else{
							require_once ("connect.php");
						}
						$prosql = "select ilogo from information where inid=1";
						$proresult = mysql_query($prosql);
						$prorow = mysql_fetch_assoc($proresult);
						if(strpos($path,'/user/') !== false){echo '<a target="_blank" href="index.php" >';}else{echo '<a href="javascript:;">';}
					?><img src="<?php if(strpos($path,'user/') !== false){echo '../';} ?>uploads/<?php echo($prorow['ilogo']);?>" alt="网页logo" title="轻松购-http://qzy.is-great.net" height="90"/></a>
				</div>
				</div>
			</div>
		</div>