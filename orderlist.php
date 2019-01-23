<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>已买到的宝贝</title>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/order.js"></script>
	<link href="css/orderlist.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="img/nhic.ico" type="image/x-icon">
	<link href="css/header.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
	<link rel="stylesheet" type="text/css" href="css/general.css"/>
	<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
	<script src="js/orderlist.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<?php
		require_once("connect.php");
		require_once("islogin.php");
		$uid=$_COOKIE['ckuid'];
		$sql121="select COUNT( * ) as isbuy from orders where ouid=$uid";
		$result121=mysql_query($sql121);
		$row121=mysql_fetch_assoc($result121);
		if($row121['isbuy']<1){
			js_go("当前没有订单，赶紧去选购吧！","index.php");
		}
		require_once ("header2.php");
	?>
<div id="order-main">
	<div id="dht">
		<ul>
			<li>当前位置 :</li>
			<li><a target="_blank" href="index.php">首页</a></li>
			<li>></li>
			<li><a href="#">我的南华</a></li>
			<li>></li>
			<li><a href="#">已买到商品</a></li>
			
		</ul>
	</div>
	<div class="clear"></div>
	<div id="order-main-left">
		<div class="tx"></div>
		<ul>
			<li><a style=" font-size:15px; color:#fe4040;">全部功能</a></li>
			<li><a target="_blank" href="cart.php">我的购物车</a></li>
			<li><a href="orderlist.php" style=" color:#fe4040;">已买到的宝贝</a>
				<ul>
					<li><a href="#">我的拍卖</a></li>
					<li><a href="#">机票酒店保险</a></li>
					<li><a href="#">我的彩票</a></li>
					<li><a href="#">我的游戏</a></li>
					<li><a href="#">官方集运</a></li>	 
				</ul>
			</li>
			<li><a href="#">购买过的店铺</a></li>
			<li><a href="#">我的发票</a>
				<ul hidden>
				   <li><a href="#">开票信息</a></li>
				   <li><a href="#">发票管理</a></li>
				</ul>
			</li>
			<li><a href="#">我的积分</a></li>
			<li><a href="#">我的优惠信息</a></li>
			<li><a href="#">评价管理</a></li>
			<li><a href="#">收货地址</a></li>
			<li><a href="#">已购买商品</a></li>
			<li><a href="#">我的收藏</a></li>
			<li><a href="#">评价管理</a></li>
			<li><a href="#">退款维权</a>
				<ul hidden>
					<li><a href="#">退款管理</a></li>
					<li><a href="#">售后管理</a></li>
					<li><a href="#">投诉管理</a></li>
					<li><a href="#">简报管理</a></li>
				</ul>
			</li>
			<li><a href="#">我的足迹</a></li>
			<li><a href="#">流量钱包</a></li>
			<li><a style=" font-size:15px; color:#fe4040;">最近访问</a></li>
			<li><a href="#">爱南华</a></li>
			<li><a href="#">我的优惠券</a></li>
		</ul>
	</div>
	<div id="order-main-right">
		<?php
			$sql1="SELECT COUNT( * ) as daifa FROM orders WHERE ouid=$uid and ostate =1 order by odate desc";
			$result1=mysql_query($sql1);
			$row1=mysql_fetch_assoc($result1);
			$sql11="SELECT COUNT( * ) as daishou FROM orders WHERE ouid=$uid and ostate =2 order by odate desc";
			$result11=mysql_query($sql11);
			$row11=mysql_fetch_assoc($result11);
			$sql12="SELECT COUNT( * ) as daiping FROM orders WHERE ouid=$uid and ostate =3 order by odate desc";
			$result12=mysql_query($sql12);
			$row12=mysql_fetch_assoc($result12);
			$daifa = $row1['daifa'];
			$daishou = $row11['daishou'];
			$daiping = $row12['daiping'];
		?>
		<div class="order-top">
			<ul>
				<li id="sydd"><a href="#">所有订单</a></li>
				<li><a href="#">待付款</a></li>
				<li><a href="#">待发货</a><a style="color:#fe4040; font-weight:500; margin-left:-10px;"><?php echo($daifa)!="0"?$daifa:"";?> </a></li>
				<li><a href="#">待收货</a><a style="color:#fe4040; font-weight:500; margin-left:-10px;"><?php echo($daishou)!="0"?$daishou:"";?> </a></li>
				<li><a href="#">待评价</a><a style="color:#fe4040; font-weight:500; margin-left:-10px;"><?php echo($daiping)!="0"?$daiping:"";?></a></li>
				<li><a href="#">分期付款</a></li>
				<p><span></span>订单回收站</p>
			</ul>
		</div>
		<div class="order-shaixuan">
		<input type="text" placeholder="请输入商品标题或订单号进行搜索" class="order-shousuo"/><input class="order-ss" type="button" value="订单搜索" /><li><a href="#">更多筛选条件&or;</a></li>
		</div>
		<div class="order-baobei">
			<ul>
				<li class="baobei-bb"><a href="#">宝贝</a></li>
				<li ><a href="#">单价</a></li>
				<li ><a href="#">数量</a></li>
				<li ><a href="#">商品操作</a></li>
				<li ><a href="#">实付款</a></li>
				<li ><a href="#">交易状态</a></li>
				<li ><a href="#">交易操作</a></li>
			</ul>
		</div>
		<div class="order-sh">
			<div class="order-shouhuo"><input class="order-all" type="checkbox"  /><a>全选</a><input class="order-pl" type="button" value="批量确认收货" /></div>
			<div class="order-ys"><input id="order-syy" style="file" type="button" value="上一页" title="已经是第一页" /><input class="order-xyy" type="button" title="点击进入下一页" value="下一页" /></div>		
		</div>
		<?php
			$sql2="SELECT * FROM orders WHERE ouid=$uid order by odate desc";
			$result2=mysql_query($sql2);
			while($row2=mysql_fetch_assoc($result2)){
				$oid = $row2['oid'];
				$dnum = $row2['onum'];
		?>
		<div id="product" class="ordernum">
		<div id="order-sz">
		<input type="checkbox" class="order-q1"/>
		<span class="order-q2"><?php echo($row2['odate'])?> &nbsp; &nbsp; &nbsp; &nbsp;订单号：<?php echo $dnum;?></span>
		</div> <table width="948">
		<?php 
			$sql3="SELECT * FROM orders INNER JOIN oitems ON orders.ouid = oitems.ouuid and orders.oid = oitems.oiid inner join product on pid= oitems.opid WHERE orders.oid='$oid' order by pid";
			$result3=mysql_query($sql3);
			while($row3=mysql_fetch_assoc($result3)){
				$pprice=$row3['price']-$row3['preferential'];
		?>
			<tr>
				<th width="4%" class="order-q4"><img src="uploads/<?php echo($row3['ppic'])?>"></th>
				<th width="36%"><p class="order-q10"><a target="_blank" href="product.php?pid=<?php echo($row3['opid'])?>"><?php echo($row3['pname'])?></a><a target="_blank" href="product.php?pid=<?php echo($row3['opid'])?>">[交易快照]</a></p><p class="order-q11"><a href="#" title="七天退换"><img src="img/order-bz1.png"/></a><a href="#" title="如实描述" ><img src="img/order-bz2.png" /></a><a href="#" title="正品保证"><img src="img/order-bz3.png" /></a></p></th>
				<th width="25%"class="order-q5"><a id="order-q6">￥<?php echo($row3['price'])?></a><br /><a id="order-q14">￥<?php echo number_format($pprice,2); ?></a></th>
				<th width="35%" class="order-q13"><?php echo($row3['onum'])?></th>
				<th width="40%" class="order-q12"><a>退款/退货</a><br /><a>投诉商家</a><br /><a>运费险已出单</a></th>
				<th width="10%"><a class="order-q18">￥<?php echo($row3['ototal'])?></a><br /><a class="order-q16">(含运费：￥0.00)</a><br /><img src="img/poneorder.png" /></th>
				<th width="10%"><a>订单详情</a><br /><a>账单详情</a><br />
					<?php
						switch($row3['ostate']){
							case 0: echo('<a class="order-q15">待审核</a>');break;
							case 1: echo('<a class="order-q15">已审核</a>');break;
							case 2: echo('<a class="order-q15">物流中</a>');break;	
							case 3: ;
							case 4: echo('<a class="order-q15">已签收</a>');break;	
							default:break;
					}?>
				</th>
				<th width="10%" class="sent">
					<?php
						switch($row3['ostate']){
							case 0: echo('<a onclick="delorder('.$oid.');">取消订单</a>');break;
							case 1: echo('<a>待发货</a>');break;
							case 2: echo('<a href="confirmstate.php?oid='.$oid.'">确认收货</a>');break;
							case 3: echo('<a href="pingjia.php?oid='.$oid.'">去评价</a>');break;	
							case 4: echo('<a>已评价</a>');break;	
							default:echo("状态出错！");break;
						};
					?>
				</th>
			</tr>
		<?php }?></table>
	</div>
	<?php }?>
</div>
<div id="order-float">
	<div class="order-f1" ></div>
		<span id="order-f2">x</span>
		<div class="order-f3">
			<div class="order-f4">
				<a class="order-f5">有问题？找<span class="order-f6">小蜜</span>哦~</a>
			</div>
			<ul>
				<li><a>收到商品有质量问题，怎么办？</a></li>
				<li><a>卖家不退运费，怎么办？</a></li>
				<li><a>卖家不发货，怎办？</a></li>
				<li><a>如何查看物流信息？</a></li>
			</ul>
			<p><a>咨询小蜜</span></a></p>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php
require_once("footer.php")
?>
</body>
</html>