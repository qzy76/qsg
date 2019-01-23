<style type="text/css">
	#footer {
		border-top: 1px solid #E4E4E4;
		<?php 
			if(strpos($_SERVER["REQUEST_URI"],'pages.php') !== false){
				?>
			background-color:<?php echo $whorow['pacolor'];?>
		<?php } ?>
	}
	
	.footerCenter {
		width: 1200px;
		height: 100%;
		margin: 0 auto;
		text-align: center;
		color: #8c8c8c;
	}
	
	.footerCenter span {
		color: #8c8c8c;
		<?php 
			if(strpos($_SERVER["REQUEST_URI"],'pages.php') !== false){
				echo 'color: #000;';
			}else{
				echo 'color: #8c8c8c;';
		} ?>
	}
	
	.footerNav {
		width: 100%;
		padding: 30px 0;
		position: relative;
	}
	
	.footerNav ul {
		margin: 0 auto;
		width: 800px;
		position: relative;
		display: block;
		line-height: 1;
		text-align: center;
	}
	
	.footerNav ul li {
		float: left;
		<?php 
			if(strpos($_SERVER["REQUEST_URI"],'pages.php') !== false){echo 'border-right: 1px solid #000;';}else{echo 'border-right: 1px solid #aaa;';}?>
	}
	
	.footerNav ul li:nth-last-child(1) {
		border: none;
	}
	
	.footerNav ul li a {
		display: block;
		margin: 0 20px;
		<?php 
			if(strpos($_SERVER["REQUEST_URI"],'pages.php') !== false){
				?>
			color: #000;
		<?php } ?>
	}
	
	.footerCopyright {
		text-align: center;
		
	}
	
	.footerCopyright span {
		padding: 0 10px;
		
	}
	<?php 
		if(strpos($_SERVER["REQUEST_URI"],'pages.php') !== false){
			echo '.footerCopyright span a{color: #000;}';
	}?>
	.clearq{
		width: 100%;height: 1px;display: block;clear: both;
	}
</style>

<div id="footer" class="clearfix">
	<div class="clearq"> </div>
	<div class="footerCenter shiyishi">
		<div class="footerNav">
			<ul>
				<li>
					<a href="#">公司简介</a>
				</li>
				<li>
					<a href="#">诚聘英才</a>
				</li>
				<li>
					<a href="#">网站联盟</a>
				</li>
				<li>
					<a href="#">轻松招商</a>
				</li>
				<li>
					<a href="#">机构销售</a>
				</li>
				<li>
					<a href="#">手机轻松</a>
				</li>
				<li>
					<a href="#">官方Blog</a>
				</li>
				<li>
					<a href="#">热刺搜索</a>
				</li>
			</ul>
		</div>
		<?php
			require_once("connect.php");
			$prosql="select * from information where inid=1";
			$proresult=mysql_query($prosql);
			$prorow=mysql_fetch_assoc($proresult);
		?>
		<div class="footerCopyright"><span><?php echo($prorow['icopyright']);?></span></div>
		<div class="footerCopyright"><span><a href="#" target="_blank" rel="nofollow"><?php echo($prorow['iicp']);?></a></span><span class="sep">|</span><span>食品流通许可证：<?php echo($prorow['isp']);?></span><br><span>客服热线：<?php echo($prorow['iphone']);?><span class="sep">|</span>邮箱：<a href="#"><?php echo($prorow['iemail']);?></a></span><br><span><span><?php echo($prorow['irecord']);?></span>，公司地址：<?php echo($prorow['iaddress']);?></span>
		</div>
	</div>
</div>