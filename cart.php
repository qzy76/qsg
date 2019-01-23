<?php require_once("islogin.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>购物车__轻松购，够轻松</title>
		<link href="css/cart.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/cart.js"></script>
		<link rel="icon" href="img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
		<link href="css/header.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
		
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.dn{display: none;}
			a{
				color: #000;
			}
		</style>
	</head>
	<body>
		<?php
			require_once("connect.php");
			$uid=$_COOKIE['ckuid'];
			$sql11="select COUNT( * ) as isbuy from cart where cuid=$uid";
			$result11=mysql_query($sql11);
			$row11=mysql_fetch_assoc($result11);
			if($row11['isbuy']<1){
				js_go("当前没有选购商品，赶紧去选购吧！","index.php");
			}
			$prosql = "select * from information where inid=1";
			$proresult = mysql_query($prosql);
			$prorow = mysql_fetch_assoc($proresult);
			 require_once ("header2.php");
		?>
		<?php if($uid!=""){?>
		<div id="content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
				<form action="updatecart.php" method="post" name="myform">
					<tr class="title_0">
						<td class="title_1">
							<input id="allCheckBox" type="checkbox" value="" onclick="selectAll()" />
							全选</td>
						<td class="title_2">名称</td>
						<td class="title_3">图片</td>
						<td class="title_4">单价</td>
						<td class="title_5">数量</td>
						<td class="title_6">金额</td>
						<td class="title_7">操作</td>
					</tr>
					<?php
				$sql="select pid,ppic,pname,price,preferential,cnum,cid from cart inner join product on cpid=pid where cuid=$uid";
				$result=mysql_query($sql);
				$total=0.0;
				while($row=mysql_fetch_assoc($result)){
					  $total+=($row['price'] - $row['preferential']) * $row['cnum'];
		?>
	<tr>
		<td class="cart_td_1"><input name="cartCheckBox" type="checkbox" value="<?php echo($row['pname']); ?>" onclick="selectSingle()" /></td>
		<td class="cart_td_2"><a target="_blank" title="<?php echo($row['pname']); ?>" href="product.php?pid=<?php echo($row['pid']); ?>"><?php echo($row['pname']); ?></a><br />
		<td class="cart_td_3"><a target="_blank" href="product.php?pid=<?php echo($row['pid']); ?>" title="<?php echo($row['pname']); ?>"><img src="uploads/<?php echo($row['ppic']); ?>" alt="<?php echo($row['pname']); ?>"/></a></td>
		<td class="cart_td_4"><?php echo($row['price'] - $row['preferential']); ?><s><?php echo($row['price']); ?></s></td>
		<td class="cart_td_6"><a class="dayuyi" href="subtractcart.php?pid=<?php echo($row['pid']); ?>&&num=1&&pag=cart"><i class="icon iconfont qzy-jian"></i></a><input type="text" class="pnum" placeholder="数量" value="<?php echo($row['cnum']); ?>" /><a href="addcart.php?pid=<?php echo($row['pid']); ?>&&num=1"><i class="icon iconfont qzy-jia" onclick="loginnow();"></i></td>
		<td class="cart_td_7"><?php echo(($row['price'] - $row['preferential']) * $row['cnum']); ?></td>
		<td class="cart_td_8"><a href="deletecart.php?pid=<?php echo($row['pid']); ?>&&pag=cart">删除</a></td>
	</tr>
	<?php } ?>
					<tr>
						<td  colspan="3">
							<a href="javascript:deleteSelectRow()">
								<img src="img/taobao_del.jpg" alt="delete"/>
							</a></td>
						<td colspan="5" class="shopend">商品总价（不含运费）：<price><?php echo ($total); ?></price> 元
							
							<span class="bt-1">
							<a href="index.php">
								返回继续购物
							</a></span>
							<a href="order.php"><input type="button" class="bt" value="结算" /></a>
						</td>
					</tr>
				</form>
			</table>

		</div>
		<?php 		
		require_once ("footer.php");
		}else{?>
			<script type="text/javascript">loginnow ();</script>
		<?php }?>

		<script type="text/javascript">
			$('.dayuyi').click(function () {
			if($(this).next().val()<=1){
				alert("商品数量最少为1！");
				return false;
			}else{
				return true;
			}
		});
		</script>
	</body>
</html>
