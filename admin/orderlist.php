<?php require_once("isAdmin.php");?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">订单列表</strong>
    	<div class="padding border-bottom">
					<ul class="search" style="padding-left:10px;">
						<li>关键字搜索：</li>
						<li>
							<input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
							<a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" >
								搜索
							</a>
						</li>
					</ul>
				</div>
        <table class="table table-hover text-center">
          <tr>
            <th>订单号</th>
            <th>姓名</th>
            <th>收货地址</th>
            <th>电话</th>
            <th>时间</th>
            <th>金额</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
			<?php
            require_once("../connect.php");
            $sql="select * from orders order by odate desc";
            $result=mysql_query($sql);
            while($row=mysql_fetch_assoc($result)){
            ?>
        <tr class="even">
            <td><?php echo($row['onum']);?></td>
            <td><?php echo($row['oname']);?></td>
            <td><?php echo($row['oaddress']);?></td>
            <td><?php echo($row['ophone']);?></td>
            <td><?php echo($row['odate']);?></td>
            <td><?php echo($row['ototal']);?></td>
            <td><?php 
            switch($row['ostate']){
                case 0: echo("待确认");break;
                case 1:echo("已确认");break;
                case 2:echo("已发货");break;
                case 3:echo("待评价");break;
                case 4:echo("已评价");break;
                default:echo("状态出错！");break;
            }
            ?>
            </td>
            <td><a href="showorder.php?onum=<?php echo($row['onum']);?>" class="button border-main icon-search" >查看订单</a>
            <?php
            switch($row['ostate']){
                case 0: echo('<a href="updatestate.php?oid='.$row['oid'].'&ostate=1" class="button border-main icon-check-square-o" >确认</a>');break;
                case 1: echo('<a href="updatestate.php?oid='.$row['oid'].'&ostate=2" class="button border-main icon-check-square-o" >发货</a>');break;
                case 2:echo('<a href="updatestate.php?oid='.$row['oid'].'&ostate=1" class="button border-main icon-check-square-o" >取消发货</a>');break;
                case 3:break;
                case 4:break;
                default:echo("状态出错！");break;
            }
            ?>
            </td>
         </tr>
			<?php
            }
            ?>
       </table>
   </div>
</form>  
</body>
</html>