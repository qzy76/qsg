<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_GET['skey'] ?><?php echo $_GET['class1'] ?><?php echo $_GET['class2'] ?><?php echo $_GET['class3'] ?>_轻松购，够轻松</title>
<link rel="icon" href="img/nhic.ico" type="image/x-icon" />
<link href="css/goodslist.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fonts/iconfont.css"/>
<link href="css/header.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/motailogin.css"/>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/index_cart.js" type="text/javascript" charset="utf-8"></script><!--模态框登录-->
</head>
<body>
	<?php
		require_once("connect.php");
		require_once ("header2.php");
	?>
	<div id="visitgoods" style="clear: both;">
	<?php 
		$index_class1 = $_GET['class1'];//大分类
		$index_class2 = $_GET['class2'];//小分类
		$index_class3 = $_GET['class3'];//细分类
		$pname = $_GET['skey'];
		if(get_magic_quotes_gpc()){
			$pname=stripslashes($pname);//去掉反斜杠
			$index_class1=stripslashes($index_class1);
			$index_class2=stripslashes($index_class2);
			$index_class3=stripslashes($index_class3);
		}
		$pname=mysql_real_escape_string($pname);//转义字符，防止sql注入攻击
		$index_class1=mysql_real_escape_string($index_class1);
		$index_class2=mysql_real_escape_string($index_class2);
		$index_class3=mysql_real_escape_string($index_class3);
		echo("<script language='javascript' type='text/javascript'>
		$(function(){
			$('#input').val('$pname');
			});
		</script>");
		?>
    <ul>
		<?php
		require_once("functions.php");
		
		mysql_set_charset('utf-8');//设置编码字符集，防止绕过字符漏洞
		if($index_class1!=null){
			$sql = "SELECT pid,ppic,pname,price,preferential,pclassification,ccconame
FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort where coname='$index_class1'";
		}else if($index_class2!=null){
			$sql = "SELECT pid,ppic,pname,price,preferential,pclassification,ccconame
FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort where cconame='$index_class2'";
		}else if($index_class3!=null){
			$sql = "SELECT pid,ppic,pname,price,preferential,pclassification,ccconame
FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort where ccconame='$index_class3'";
		}else if($pname!=null){
			$sql="SELECT pid,ppic,price,pname,ccconame FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort where pname like '%".$pname."%'";
		}else{
			$sql = "SELECT pid,ppic,pname,price,preferential,pclassification,ccconame
			FROM product INNER JOIN ccclassification ON pclassification = cccoid INNER JOIN cclassification ON ccoid = cccosort INNER JOIN classification ON coid = ccosort order by rand() limit 0,20";
		}
		$result=mysql_query($sql);
		
		while($row= mysql_fetch_assoc($result)){
			$spid = $row['pid'];
		?>
          <li><a target="_blank" href="<?php echo('product.php?pid='.$spid)?>"><img src="uploads/<?php echo($row['ppic'])?>" width="248" height="248"></a>
          <div class="smallgood"><p><?php echo($row['pname'])?> <?php echo $row['ccconame'];?></p>
          <h4>&nbsp;￥<?php echo($row['price']-$row['preferential'])?></h4><a href="<?php if(strpos($_SERVER["REQUEST_URI"],'goodslist.php') !== false&&$uid==""){echo 'javascript:;';}else{echo ('addcart.php?pid='.$spid.'&&num=1');}?>"><button onclick="loginnow();"><i title="点击加入购物车" class="icon iconfont qzy-qzycart"></i></button></a>
          </div>
          </li>
	<?php } ?>
    </ul>
   </div>
  <script src="js/goodslist.js" language="javascript" type="text/javascript"></script>
  <div class="clear"></div>
  <?php
	require_once ("footer.php");
	?>
</body>
</html>