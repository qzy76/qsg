<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>购物结算_轻松购，够轻松</title>
		<link href="css/cart.css" type="text/css" rel="stylesheet" />
		<!--<script type="text/javascript" src="js/cart.js"></script>-->
		<link rel="icon" href="img/nhic.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
		<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
		<link href="css/header.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/general.css"/>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script><!--模态框登录-->
	</head>
	<body>
		<?php
		require_once("header2.php");
		?>
		<div id="content">
    <h2 class="title">客户信息</h2>
	    <div id="form">
	      	<form action="insertorder.php" method="post">
	        	<p><label>*姓名：</label><input type="text" name="oname" id="mUserName" class="txt" value="邱钟毅" required="姓名不能为空"/></p>
	            <p><label>*电话：</label><input type="text" name="ophone"  class="txt" value="13178786022" required="电话不能为空"/></p>
	            <p><label>*地址：</label><input type="text" name="oaddress" class="ltxt" id="mTitle"value="广东省广州市南华工商学院" required="姓名不能为空"/></p>
	            <p><input type="submit" class="bt" value="确定提交" /></p>
	            
	       </form>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
				<form action="updatecart.php" method="post" name="myform">
					<tr class="title_0">
						<td class="title_2">名称</td>
						<td class="title_3">图片</td>
						<td class="title_4">单价</td>
						<td class="title_5">数量</td>
						<td class="title_6">小结</td>
						<td class="title_7">操作</td>
					</tr>
					<?php
						require_once("connect.php");
						require_once("islogin.php");
						$uid=$_COOKIE['ckuid'];
						$sql="select pid,ppic,pname,price,preferential,cnum,cid from cart inner join product on cpid=pid where cuid=$uid";
						$result=mysql_query($sql);
						$total=0.0;
						while($row=mysql_fetch_assoc($result)){
							$total+=($row['price'] - $row['preferential']) * $row['cnum'];
					?>
					<tr>
						<td class="cart_td_2"><a target="_blank" title="<?php echo($row['pname']); ?>" href="product.php?pid=<?php echo($row['pid']); ?>"><?php echo($row['pname']); ?></a><br />
						<td class="cart_td_3"><a target="_blank" href="product.php?pid=<?php echo($row['pid']); ?>" title="<?php echo($row['pname']); ?>"><img src="uploads/<?php echo($row['ppic']); ?>" alt="<?php echo($row['pname']); ?>"/></a></td>
						<td class="cart_td_4"><?php echo($row['price'] - $row['preferential']); ?></td>
						<td class="cart_td_6"><?php echo($row['cnum']); ?></td>
						<td class="cart_td_7"><?php echo(($row['price'] - $row['preferential']) * $row['cnum']); ?></td>
						<td class="cart_td_8"><a href="javascript:deleteRow('<?php echo($row['pname']); ?>');">删除</a></td>
					</tr>
					<?php } ?>
					<tr>
						<td  colspan="3"></td>
						<td colspan="5" class="shopend">商品总价（不含运费）：<price><?php echo($total); ?></price> 元
						</td>
					</tr>
				</form>
			</table>
		</div>
		<!--底部-->
		<?php require_once ("footer.php");?>
		<script type="text/javascript">
			$('.dayuyi').click(function() {
				if($(this).next().val() <= 1) {
					alert("商品数量不能小于1！");
					return false;
				} else {
					return true;
				}
			});
		</script>
	</body>
</html>
