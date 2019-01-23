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
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script src="js/qzy_choose.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">细分类列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="ccclassificationAdd.php"> 添加商品细分类</a> </li>
        <li>搜索：</li>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value">
             
              <option value="classificationlist.php">商品大分类</option>
              <option value="cclassificationlist.php">商品小分类</option>
              <option value="ccclassificationlist.php" selected="selected">商品细分类</option>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
         <th>细分类名称</th>
        <th>所属小分类</th>
        <th>排序</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $psql="SELECT * FROM ccclassification ORDER BY cccoid";
            $presult=mysql_query($psql);
            while($prow=mysql_fetch_assoc($presult)){
            	$cccosort=$prow['cccosort'];
							$pntsql="select * from cclassification where ccoid=$cccosort";
							//echo($pntsql);
							$pntresult=mysql_query($pntsql);
							$pntrow=mysql_fetch_assoc($pntresult);
            	?>
          <tr>
          <td style="text-align:left; padding-left:20px;">
           <?php echo($prow['cccoid']);?></td>
           <td><?php echo($prow['ccconame']);?></td>
           <td><?php echo($pntrow['cconame']);?></td>
           <td><?php echo($prow['cckcosort']);?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="ccclassificationUpdate.php?cccoid=<?php echo($prow['cccoid']);?>"><span class="icon-edit"></span> 修改</a> 
          	<a class="button border-red" onclick="delclass(<?php echo($prow['cccoid']);?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php }?>
        
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>

</body>
</html>