<?php require_once("isAdmin.php");?>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<link rel="stylesheet" href="css/pintuer.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/qzy.css">
		<script src="js/jquery.js"></script>
		<script src="js/pintuer.js"></script>
		<script src="js/qzy_choose.js"></script>
		<style type="text/css">
			img{
				width: 100px;
				max-height: 80px;
				overflow: hidden;
			}
			.color{
				width: 60px;height: 60px;color: #fff;
				text-align: center;line-height: 60px;
			}
		</style>
	</head>
	<body>
		<form method="post" action="" id="listform">
			<div class="panel admin-panel">
				<div class="panel-head">
					<strong class="icon-reorder">活动页列表</strong>
				</div>
				<div class="padding border-bottom">
					<ul class="search" style="padding-left:10px;">
						<li>
							<a class="button border-main icon-plus-square-o act2" href="activeMake.php">添加活动页</a>
						</li>
						<li>
							<select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value">
								<option value="activelist.php">添加推广页</option>
								<option value="activePageList.php" selected>活动页生成</option>
							</select>
						</li>
						<li style="padding-left: 10px;">关键字搜索：</li>
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
						<th width="40" style="text-align:left; padding-left:20px;">ID</th>
						<th width="120">活动名称</th>
						<th width="80">引用链接</th>
						<th>背景图</th>
						<th>背景色</th>
						<th width="120">领券图</th>
						<th width="120">活动介绍图</th>
						<th width="120">标题背景图</th>
						<th width="10%">时间</th>
						<th width="310">操作</th>
					</tr>
					<volist name="list" id="vo">
						<?php
							require_once("../connect.php");
							$bsql="SELECT * FROM activepage ORDER BY paid";
							$bresult=mysql_query($bsql);
							while($brow=mysql_fetch_assoc($bresult)){ ?>
							<tr>
							<td style="text-align:left; padding-left:20px;"><?php echo($brow['paid']); ?></td>
							<td><a target="_blank" href="../pages.php?paid=<?php echo($brow['paid']); ?>"><?php echo($brow['paname']); ?></a></td>
							<td class="lianjie">pages.php?paid=<?php echo($brow['paid']); ?></td>
							<td><?php if($brow['papic']==""){echo "空";}else{echo'<img src="../uploads/'.$brow["papic"].'"/>';};?></td>
							<td><div class="color" style="background-color: <?php echo($brow['pacolor']); ?>;"><?php echo($brow['pacolor']); ?></div></td>
							<td><?php if($brow['paquanpic']==""){echo "空";}else{echo'<img src="../uploads/'.$brow["paquanpic"].'"/>';};?></td>
							<td><?php if($brow['paapic']==""){echo "空";}else{echo'<img src="../uploads/'.$brow["paapic"].'"/>';};?></td>
							<td><?php if($brow['patitleBagPic']==""){echo "空";}else{echo'<img src="../uploads/'.$brow["patitleBagPic"].'"/>';};?></td>							
							<td><?php echo($brow['padate']); ?></td>
							<td>
							<div class="button-group">
							<a class="button border-main" href="pagesupdate.php?paid=<?php echo($brow['paid']); ?>"><span class="icon-edit"></span> 修改</a>
							<a class="button border-red isdel" onclick="delactive(<?php echo($brow['paid']); ?>);"><span class="icon-trash-o isdel"></span> 删除</a> </div></td>
							</tr>
						<?php } ?>
							<tr><td colspan="9">提示：点击活动名称调到对应的活动页</td><td colspan="6"></td></tr>
				</table>
			</div>
		</form>
		<script type="text/javascript">
			function delactive(id){
				var a = confirm("您确定要删除吗?")
				if(a==true){
					window.location.href="activePageDelete.php?paid="+id;
				}else{
					return;
				}
			}
		</script>
	</body>
</html>