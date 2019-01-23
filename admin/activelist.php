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
	</head>
	<body>
		<form method="post" action="" id="listform">
			<div class="panel admin-panel">
				<div class="panel-head">
					<strong class="icon-reorder">活动列表</strong>
				</div>
				<div class="padding border-bottom">
					<ul class="search" style="padding-left:10px;">
						<li>
							<a class="button border-main icon-plus-square-o act1" href="activeAdd.php">添加页面</a>
						</li>
						<li>
							<select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value">
								<option value="activeAdd.php" selected>添加推广页</option>
								<option value="activePageList.php">活动页生成</option>
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
						<th>图片</th>
						<th width="120">标题</th>
						<th>链接</th>
						<th width="10%">排序</th>
						<th width="10%">更新时间</th>
						<th width="310">操作</th>
					</tr>
					<volist name="list" id="vo">
						<?php
							require_once("../connect.php");
							$bsql="SELECT * FROM activity ORDER BY aid";
							$bresult=mysql_query($bsql);
							while($brow=mysql_fetch_assoc($bresult)){ ?>
							<tr>
							<td style="text-align:left; padding-left:20px;">
							<?php echo($brow['aid']); ?></td>
							<td><img src="../uploads/<?php echo($brow['apic']); ?>" alt="" width="100"/></td>
							<td><a target="_blank" href="../<?php echo($brow['aurl']); ?>"><?php echo($brow['aname']); ?></a></td>
							<td><?php echo($brow['aurl']); ?></td>
							<td><?php echo($brow['asort']); ?></td>
							<td><?php echo($brow['adate']); ?></td>
							<td>
							<div class="button-group">
							<a class="button border-main" href="pageUpdate.php?aid=<?php echo($brow['aid']); ?>"><span class="icon-edit"></span> 修改</a>
							<a class="button border-red isdel" onclick="delactive(<?php echo($brow['aid']); ?>);"><span class="icon-trash-o isdel"></span> 删除</a> </div></td>
							</tr>
						<?php } ?>
						
				</table>
			</div>
		</form>
		<script type="text/javascript">
			function delactive(id){
				var a = confirm("您确定要删除吗?")
				if(a==true){
					window.location.href="activeDelete.php?aid="+id;
				}else{
					return;
				}
			}
		</script>
	</body>
</html>