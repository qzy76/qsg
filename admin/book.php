<?php require_once("isAdmin.php");?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="renderer" content="webkit">
	<title></title>  
	<link rel="stylesheet" href="css/pintuer.css">
	<link rel="stylesheet" href="css/admin.css">
	<script src="js/jquery.js"></script>
	<script src="js/pintuer.js"></script>  
	<script src="js/qzy_choose.js"></script>  
	<style type="text/css">
		img{width: 100px;height: 100px;}
	</style>
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
	<div class="panel-head"><strong class="icon-reorder"> 评价管理</strong></div>
	<div class="padding border-bottom">
	  <ul class="search">
		<li>
		  <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
		  <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
		</li>
	  </ul>
	</div>
	<table class="table table-hover text-center">
	  <tr>
		<th>评价ID</th>
		<th width="15%">商品ID_商品名称</th>
		<th>用户ID_用户名称</th>
		<th>图片</th>
		<th width="40%">评价内容</th>
		<th>评分</th>
		 <th>时间</th>
		<th>操作</th>	   
	  </tr>
		<?php
			require_once ("../connect.php");
			$sql="select eid,epid,pname,euid,uname,epic,etitle,estar,edate from evaluation inner join product on pid=epid inner join users on euid = uid order by edate desc";
			$bresult=mysql_query($sql);
			while($brow=mysql_fetch_assoc($bresult)){ ?>
			<tr>
				<td><?php echo($brow['eid']); ?></td>
				<td><?php echo($brow['epid']); ?> _ <a target="_blank" href="../product.php?pid=<?php echo($brow['epid']); ?>"><?php echo($brow['pname']); ?></a></td>
				<td><?php echo($brow['euid']); ?> _ <?php echo($brow['uname']); ?></td>
				<td><img src="../uploads/<?php echo($brow['epic']); ?>"/></td>  
				<td><?php echo($brow['etitle']); ?></td>		 
				<td><?php echo($brow['estar']); ?></td>
				<td><?php echo($brow['edate']); ?></td>
				<td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return delpingjia(<?php echo($brow['eid']); ?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
			</tr>
		<?php } ?>
		
		
	  <tr>
		<td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
	  </tr>
	</table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>