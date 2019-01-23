<!DOCTYPE html>
<html>
	<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="panel admin-panel">
  	<div class="panel-head">
  	<strong class="icon-reorder">基本信息</strong>
    <?php
	require_once("../connect.php");
	$onum=$_GET['onum'];
	$sql="select * from orders inner join users on uid = ouid where onum=$onum";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	?>
    <ul>
    	<li><label>订单号：</label><?php echo($row['onum']);?></li>
        <li><label>用户ID：</label><?php echo($row['uid']);?></li>
        <li><label>姓名：</label><?php echo($row['oname']);?></li>
        <li><label>地址：</label><?php echo($row['oaddress']);?></li>
        <li><label>手机号：</label><?php echo($row['ophone']);?></li>
        <li><label>总金额：</label><?php echo($row['ototal']);?>元</li>
        <li><label>下单日期：</label><?php echo($row['odate']);?></li>
        <li><label>状态：</label><?php 
	switch($row['ostate']){
		case 0: echo("未确认");break;
		case 1:echo("已确认");break;
		case 2:echo("已发货");break;
		case 3:echo("已发货确认");break;
		case 4:echo("已评价");break;
		default:echo("状态出错！");break;
	}
	?></li>
    </ul>
    </div>
    <div class="panel-head"><strong class="icon-reorder">订单详情</strong>
    <a href="" style="float:right; display:none;">添加字段</a></div>
        <table class="table table-hover text-center">
          <tr>
            <th width="20">ID</th>
            <th>名称</th>
            <th>图片</th>
            <th>数量</th>
            <th>小结</th>
          </tr>
			<?php
            require_once("../connect.php");
            $sql2="SELECT * FROM orders INNER JOIN oitems ON orders.ouid = oitems.ouuid and orders.oid = oitems.oiid inner join product on pid= oitems.opid WHERE orders.onum=$onum";
	$result2=mysql_query($sql2);
	while($row2=mysql_fetch_assoc($result2)){
	?>
        <tr class="even">
            <td><?php echo($row2['pid']);?></td>
    <td><a target="_blank" href="../product.php?pid=<?php echo($row2['oiid']);?>"><?php echo($row2['pname']);?></a></td>
    <td><a target="_blank" href="../product.php?pid=<?php echo($row2['oiid']);?>"><img width="100" src="../uploads/<?php echo($row2['ppic']);?>" /></a></td>
	<td><?php echo($row2['onum']);?></td>
    <td><?php echo($row2['opprice']);?></td>
         </tr>
			<?php
            }
            ?>
       </table>
   </div>
</body>
</html>
