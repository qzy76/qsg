<!DOCTYPE html>
<html>
	<head>
<meta charset="UTF-8">
<?php
	require_once ("connect.php");
	$pid = intval($_GET['pid']);
	if($pid==""){ header("location:index.php");}
	$psql = "SELECT pid,ppic,ppic2,ppic3,ppic4,ppic5,pname,price,preferential,pinventory,phot,pnew,psale,ptuan,pclassification,ccoid,coid,coname,cconame,ccconame,pcontent,pcheck
	FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort where pid=$pid";
	$presult = mysql_query($psql);
	$prow = mysql_fetch_assoc($presult);
	if($prow['pid']==""){ header("location:index.php");}//数据库没有对应的商品
	$prosql = "select * from information where inid=1";
	$proresult = mysql_query($prosql);
	$prorow = mysql_fetch_assoc($proresult);
?>
<link rel="icon" href="img/nhic.ico" type="image/x-icon" />
<title><?php echo($prow['pname']); ?><?php echo($prow['cconame']); ?><?php echo($prow['coname']); ?>-轻松购_http://nhic.is-great.org_上轻松购，购轻松！</title>
<link href="css/goods1.css" rel="stylesheet" type="text/css" />
<link href="css/goods2.css" rel="stylesheet" type="text/css" />
<link href="css/header.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" href="css/post.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/zzsc-demo.css">
<link rel="stylesheet" type="text/css" href="css/zoomio.css">
<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/product_news.js"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script><!--获取用户地址-->
<script type="text/javascript" src="js/Popt.js"></script>
<script src="js/product_banner.js" type="text/javascript" charset="utf-8"></script><!--广告轮播-->
<script type="text/javascript" src="js/city.json.js"></script>
<script type="text/javascript" src="js/citySet.js"></script>
<script src="js/product_tuan.js" type="text/javascript" charset="utf-8"></script><!--团购倒计时-->
<script src="js/product_cart.js" type="text/javascript" charset="utf-8"></script><!--商品数量增减-->
<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script><!--模态框登录-->
<script type="text/javascript">
	function updatezoomioimage(targetid, src) {
		var $ = jQuery;
		$('#' + targetid).attr('src', src);
		$('#' + targetid).zoomio();
	};
	$(function() {
		for(i = 0; i < $('.Pimg').children('img').length; i++) {
			var q = $('.Pimg').children('img').eq(i).prop('src');
			if(q.substr(q.length - 1, 1) == "/") {
				$('.Pimg').children('img').eq(i).css({display: "none"});
			}
		}
	});
</script>
</head>
<body>
	<?php require_once ("header2.php");?>
	</div>
	<div id="top_main" class="clearfix"></div>
	<div class="main clearfix">
		<div class="main_top clearfix">
			<div class="pro_fenlei clearfix">
				当前位置：<a href="index.php" target="_blank">首页</a><i>&gt;</i>
				<a target="_blank" href="goodslist.php?class1=<?php echo($prow['coname']); ?>"><?php echo($prow['coname']); ?></a><i>&gt;</i>
				<a target="_blank" href="goodslist.php?class2=<?php echo($prow['cconame']); ?>"><?php echo($prow['cconame']); ?></a><i>&gt;</i>
				<a target="_blank" href="goodslist.php?class3=<?php echo($prow['ccconame']); ?>"><?php echo($prow['ccconame']); ?></a>
			</div>
			<div class="pro_main clearfix">
				<div class="main_l clearfix">
					<div class="main_pic clearfix">
						<div id="gallerycontainer">
							<img id="gallery-target" src="uploads/<?php echo($prow['ppic']); ?>" />
							<div id="gallery-thumbs" class="Pimg" style="text-align:center"> 
								<img src="uploads/<?php echo($prow['ppic']); ?>" onClick="updatezoomioimage('gallery-target', 'uploads/<?php echo($prow['ppic']); ?>')">
								<img src="uploads/<?php echo($prow['ppic2']); ?>" onClick="updatezoomioimage('gallery-target', 'uploads/<?php echo($prow['ppic2']); ?>')">
								<img src="uploads/<?php echo($prow['ppic3']); ?>" onClick="updatezoomioimage('gallery-target', 'uploads/<?php echo($prow['ppic3']); ?>')">
								<img src="uploads/<?php echo($prow['ppic4']); ?>" onClick="updatezoomioimage('gallery-target', 'uploads/<?php echo($prow['ppic4']); ?>')">
								<img src="uploads/<?php echo($prow['ppic5']); ?>" onClick="updatezoomioimage('gallery-target', 'uploads/<?php echo($prow['ppic5']); ?>')">
							</div>
						</div>
						<div class="share">
							<a href="#"><i class="icon iconfont qzy-start"></i>分享</a>
							<a href="#"><i class="icon iconfont qzy-fenxiang"></i>收藏商品</a>
							<span style="cursor:default;">点击小图，移至大图看放大效果哦！</span>
						</div>
					</div>
					<div class="main_l_r">
						<h3><?php echo($prow['pname']); ?> <?php echo($prow['cconame']); ?> <?php echo($prow['coname']); ?></h3>
						<div class="pro_tuan">
							<span class="pro_type"><?php if($prow['ptuan']==1){echo '团购商品';}else if($prow['pnew']==1){echo '新品上市';}else if($prow['phot']==1){echo '热销商品';}else if($prow['psale']==1){echo '促销商品';}?></span>
							</a>
							<div>
								<input type="hidden" class="times" value="<?php echo($prow['pcheck']); ?>" />
								<i>距结束仅剩</i> <span><small class="days"></small></span><s>天</s>
								<span><small class="hours"></small></span> <s>:</s>
								<span><small class="minutes"></small></span> <s>:</s>
								<span><small class="seconds"></small></span>
							</div>
						</div>
						
						<div class="tuan_price">
							<dl>
								<dt class="tuan_jia"><?php if($prow['ptuan']==1){
											echo '团  购  价：';
										}else if($prow['pnew']==1){
											echo '新  品  价：';
										}else if($prow['phot']==1){
											echo '热  销  价：';
										}else if($prow['psale']==1){
											echo '促  销  价：';
										}else{echo '在  售  价：';}?></dt>
								<dd>
									<span class="pro_num">
										¥ <em class="pro_price"><?php echo($prow['price'] - $prow['preferential']); ?></em>
									</span>
									<span class="yuanjia">￥<?php echo($prow['price']); ?></span>
									<span class="sheng" name="<?php echo($prow['preferential']); ?>">立省<?php echo($prow['preferential']); ?>元</span>
								</dd>
						   </dl>
						</div>
						<div class="pro_inner">
							<dl class="pro1">
								<dt>配&nbsp; &nbsp; &nbsp; &nbsp;送：</dt>
								<dd>
								<script type="text/javascript">
									$(function(){
										$("#city").val(returnCitySN.cname);
									});
							</script>
									<div class="wrap">
										<input class="input" name="" id="city" type="text" placeholder="收货地" autocomplete="off"/>
									</div>
								<script type="text/javascript">
									$("#city").click(function(e) {
										SelCity(this, e);
									});
							</script>
								</dd>
							</dl>
							<dl class="pro2">
								<dt>评&nbsp; &nbsp; &nbsp; &nbsp;价：</dt>
								<dd><a>购买评价&nbsp;<em>
								<?php
								$ssql = "SELECT COUNT( * ) as pingjia FROM `evaluation` WHERE epid=$pid";
								$sresult = mysql_query($ssql);
								$srow = mysql_fetch_assoc($sresult);
								$pnum = $srow['pingjia'];
								?>
									<?php echo($pnum); ?>
									</em></a><span>|</span>
									<a class="cjjl" title=" <?php echo($qrow['COUNT( * )']); ?>">成交记录&nbsp;<em>
									<?php
										$qsql = "SELECT COUNT( * ) FROM  `oitems` LEFT JOIN orders ON opid = ouid WHERE opid =$pid";
										$qresult = mysql_query($qsql);
										$qrow = mysql_fetch_assoc($qresult);
									?>
								<?php echo($qrow['COUNT( * )']); ?>
								</em></a></dd>
							</dl>
							<dl class="pro5">
								<dt>数&nbsp; &nbsp; &nbsp; &nbsp;量：</dt>
								<dd><input type="text" id="buynum" value="1" />
									<span style="position: relative;">
										<lable style=" display: block; width: 18px; height: 14px;"><img class="add" src="img/cartadd.jpg" style=" display: inline-block; position: absolute;top: 0px; left: 0px; width: 18px; height: 14px;"></img></lable>
										<img class="lose" src="img/cartadd1.jpg"style=" display:block; position: absolute;bottom: 0px; left: 0px; width: 18px; height: 14px;"></img>
									</span>
									<span>
										<i>件</i>库存量<b class="pinventory"><?php echo($prow['pinventory']); ?></b>件
									</span>
								</dd>
						  </dl>
						  <dl class="pro3" style="opacity: 0;cursor:default;">
								<dt>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</dt>
								<dd></dd>
						  </dl>
							<div class="buy">										
							   <a class="buy-now" target="_blank">立即购买</a>
							   <a class="addcart" href="addcart.php?pid=<?php echo($prow['pid']); ?>">加入购物车</a>
							</div>
						</div>
					</div>
				</div>
				<div class="main_r">
					<div class=" main_r_top">
						<s></s><span>大家都在买</span>
					</div>
					<div class="pro_hot">
						<ul>
							<?php
							$pasql="select * from product where psale=1 order by rand() limit 0,3";
							$paresult=mysql_query($pasql);
							while($parow=mysql_fetch_assoc($paresult)){
							?>
							<li>
								<div>
									<a class="pro_text" title="<?php echo($parow['pname']); ?>/<?php echo($parow['CPU']); ?>" href="product.php?pid=<?php echo($parow['pid']); ?>" target="_blank">
										<img src="uploads/<?php echo($parow['ppic']); ?>"></a>
									<p class="pro_price">¥<?php echo($parow['price'] - $parow['preferential']); ?></p>
								</div>
								<p class="look_title">
									<a class="pro_text" href="product.php?pid=<?php echo($parow['pid']); ?>" title="<?php echo($parow['brname']); ?> <?php echo($parow['pname']); ?>" target="_blank"><?php echo($parow['pname']); ?></a>
								</p> 
							</li>
							<?php } ?>
						</ul>
				</div>
			</div>
		</div>
		<!--商品热卖-->
		<div class="hot_pro clearfix">
			<div class="hot_h">店铺热卖</div>
			<ul>
				<?php
					$pbsql="select * from product where phot=1 order by rand() limit 0,6";
					$pbresult=mysql_query($pbsql);
					while($pbrow=mysql_fetch_assoc($pbresult)){
					?>
					<li>
					<a href="product.php?pid=<?php echo($pbrow['pid']); ?>" title="<?php echo($pbrow['brname']); ?> <?php echo($pbrow['pname']); ?>"target="_blank">
						<img class="hot-pic" src="uploads/<?php echo($pbrow['ppic']); ?>" alt="<?php echo($pbrow['pname']); ?>">
						<span class="hot-title" title="<?php echo($pbrow['pname']); ?>"><?php echo($pbrow['pname']); ?></span>
					</a>
					<div>¥<span><?php echo($pbrow['price'] - $pbrow['preferential']); ?></span></div>
				</li>
						<?php } ?>
			</ul>
		</div>
		<!--详情-->
		<div class="main_bottom clearfix">
			<div class="bottom_l">
				<ul>
					<?php
					$asql = "select * from activity where apic !='' order by asort LIMIT 0,10";
					$aresult = mysql_query($asql);
					while($arow = mysql_fetch_assoc($aresult)){
					?>
					<li><a href="<?php echo($arow['aurl']); ?>" target="_blank"><img src="uploads/<?php echo($arow['apic']); ?>"/></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="bottom_r">
				<div class="shangpingxiangqing">
					<ul id="myTab" class="nav nav-tabs">
	<li class="active" data-val = "1"><a>商品介绍</a></li>
	<li data-val = "2"><a>售后保障</a></li>
	<li data-val = "3"><a>商品评价(<?php echo($pnum); ?>)</a></li>
	</ul>
	<div id="myTabContent" class="tab-content" style=" color: #333 !important;">
		<div class="tab-pane active" id="goods_home">
			<div id="banner">
				<ul class="bannerlist">
						<?php
							$sql="select * from banner order by rand()  limit 0,4";
							$bresult=mysql_query($sql);
							while($brow=mysql_fetch_assoc($bresult)){
							?>
								<li><a href="<?php echo($brow['burl']); ?>"><img class="bannerpic" title="<?php echo($brow['bname']); ?>" src="uploads/<?php echo($brow['bpic']); ?>"/></a></li>
						<?php } ?>
				</ul>
				<span class="pre">pre</span>
				<span class="next">next</span>
				<ul class="bannernav"></ul>
			</div>
			<div class="w10 h15 cb"></div>
				<?php echo($prow['pcontent']); ?>
		</div>
		<div class="tab-pane fade" id="goods_sh">
			<dl>
				<dt>
					<i class="goods"></i>
					<strong>南华承诺</strong>
				</dt>
				<dd>
					南华平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！<br>
					注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
				</dd>
				<dt>
					<i class="goods"></i><strong>正品行货</strong>
				</dt>
				<dd>南华商城向您保证所售商品均为正品行货，南华自营商品开具机打发票或电子发票。</dd>
					<dt><i class="unprofor"></i><strong>全国联保</strong></dt>
				<dd>
					凭质保证书及南华商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由南华联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。南华商城还为您提供具有竞争力的商品价格和<a href="//help.jd.com/help/question-892.html" target="_blank">运费政策</a>，请您放心购买！
					<br><br>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
				</dd>
					<dt><i class="no-worries"></i><strong>无忧退换货</strong></dt>
				<dd class="no-worries-text">
					客户购买南华自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）
				</dd>
			</dl>
			<div class="state">
				<strong>权利声明：</strong><br>南华上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是南华重要的经营资源，未经许可，禁止非法转载使用。
				<p><b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p>
											<br>
				<strong>价格说明：</strong><br>
				<p><b>南华价：</b>南华价为商品的销售价，是您最终决定是否购买商品的依据。</p>
				<p><b>划线价：</b>商品展示的划横线价格为参考价，并非原价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在南华平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。</p>
				<p><b>折扣：</b>如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。</p>
				<p><b>异常问题：</b>商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。</p>

			</div>
		</div>
		<div class="tab-pane fade" id="goods_pl">
			<h4>商品评价<span style="color: #333;">( <?php echo($pnum); ?>)</span></h4>
			<?php
				if ($pnum != "0") {
				?>
			<div class="pingjia">
				<div class="xingji">
					<?php
						$psql = "SELECT estar FROM `evaluation` WHERE epid=$pid";
						$presult = mysql_query($psql);
						$allstar = "";
						while ($prow = mysql_fetch_assoc($presult)){
							$allstar += $prow['estar'];//总评价分
						}
						$yuanxingjindu = $allstar/$pnum/5*629;
						$yuanxingjindu = 629;
						$fen = ($allstar/$pnum)*20;
						$fen = 100;
						$fen>0?$color="#8B0000":null;
						$fen>60?$color="#FF0000":null;
						$fen>65?$color="#FFA500":null;
						$fen>70?$color="#DAA520":null;
						$fen>75?$color="#ADFF2F":null;
						$fen>80?$color="#7CFC00":null;
						$fen>90?$color="#008000":null;
					?>
					<i class="pingjia2">
		<svg viewBox="-10 -10 220 220">
			<g fill="none" stroke-width="9" transform="translate(100,100)">
				<path d="M 0,-100 A 100,100 0 0,1 86.6,-50 
						M 86.6,-50 A 100,100 0 0,1 86.6,50 
						M 86.6,50 A 100,100 0 0,1 0,100 
						M 0,100 A 100,100 0 0,1 -86.6,50 
						M -86.6,50 A 100,100 0 0,1 -86.6,-50 
						M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="<?php echo $color;?>">
				</path>
			</g>
		</svg>
		<svg viewBox="-10 -10 220 220">
		<path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="<?php echo $yuanxingjindu ?>"></path>
		</svg>
	</i>
<span><?php echo $fen; ?>%</span>
<span>好评率</span>
				</div>
			</div>
			<div class="pingjial">
				<?php
				$hsql = "SELECT COUNT( * ) as num FROM `evaluation` WHERE epid=$pid and estar>3";//评价大于3分的数量
				$hresult = mysql_query($hsql);
				$hrow = mysql_fetch_assoc($hresult);
				$zsql = "SELECT COUNT( * ) as num FROM `evaluation` WHERE epid=$pid and estar=3";//评价等于3分的数量
				$zresult = mysql_query($zsql);
				$zrow = mysql_fetch_assoc($zresult);
				$csql = "SELECT COUNT( * ) as num FROM `evaluation` WHERE epid=$pid and estar<3";//评价小于3分的数量
				$cresult = mysql_query($csql);
				$crow = mysql_fetch_assoc($cresult);
				$tsql = "SELECT COUNT( * ) as num FROM `evaluation` WHERE epid=$pid and epic!=''";//评价后图片不为空的数量
				$tresult = mysql_query($tsql);
				$trow = mysql_fetch_assoc($tresult);
				?>
				<span class="on" data-type="1">全部（<?php echo $pnum; ?>）</span>
				<span data-type="2"  class="">好评（<?php echo $hrow['num']; ?>）</span>
				<span data-type="3" class="">中评（<?php echo $zrow['num']; ?>）</span>
				<span data-type="4" class="">差评（<?php echo $crow['num']; ?>）</span>
				<span data-type="5" class="">晒图（<?php echo $trow['num']; ?>）</span>
			</div>
			<?php
				$qazxsql="SELECT * FROM evaluation INNER JOIN product ON pid = epid INNER JOIN users ON uid = euid WHERE pid=$pid";
				$qazxresult=mysql_query($qazxsql);
				while($qazxrow=mysql_fetch_assoc($qazxresult)){
					$star = $qazxrow['estar'];
			?>
			<div class="pinglun">
				<div class="pinglunright">
					<div>
						<i class="icon iconfont qzy-start <?php echo($star>=1)?"active":""; ?>"></i>
						<i class="icon iconfont qzy-start <?php echo($star>=2)?"active":""; ?>"></i>
						<i class="icon iconfont qzy-start <?php echo($star>=3)?"active":""; ?>"></i>
						<i class="icon iconfont qzy-start <?php echo($star>=4)?"active":""; ?>"></i>
						<i class="icon iconfont qzy-start <?php echo($star=5)?"active":""; ?>"></i>
					</div>
					<p class="comment-con"><?php echo($qazxrow['etitle']); ?></p>
					<div class="pic-list J-pic-list">
							<a class="J-thumb-img" href="#none" data-ind="0"><img src="uploads/<?php echo($qazxrow['epic']); ?>" width="48" height="48"></a>
					</div>
					<div class="order-info">
						<span><?php echo($qazxrow['uname']); ?></span>
						<span><?php echo($qazxrow['pname']); ?></span>
						<span><?php echo($qazxrow['edate']); ?></span>
					</div>		   
				</div>
				<p class="border-bottom"></p>	
			</div>
			<?php } ?>
		</div>
			<?php } ?>
			<?php
				if ($pnum == "0") {?>
				<div class="pingjiachi">
					<i class="icon" style="display: block; width: 80px; height: 80px; margin: 0 auto;background: url(img/pingjiaicon.png) no-repeat 0 -480px; overflow: hidden; margin-bottom: 15px;"></i> 
					买家还没有留下对我的印象，陪我一起等一下嘛~
					</div>
			<?php	}	?>
	</div></div>
			</div>
		</div>
	</div>
	<!--底部-->
		<?php
		require_once ("footer.php");
		?>
<script type="text/javascript">
	$(function () {
		var leftH = $('#bottom_l').height();
		var height = $('#myTab').height();
			height+=$('#myTabContent').height();
		var gao = leftH>height?leftH+50:height+50;
		$('.main_bottom').css("height",gao);
		$('#myTab').children('li').click(function () {
			height=$('#myTabContent').height();
			gao = leftH>height?leftH+50:height+50;
			$('.main_bottom').css("height",gao);
		});
	});
</script>
<!--图片放大-->
<script type="text/javascript" src="js/zoomio.js"></script>
</boby>
</html>