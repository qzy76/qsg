<?php require_once("isAdmin.php");?><!DOCTYPE html>
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
<style type="text/css">
	.title{width: 150px;height: 100px;text-overflow: ellipsis;overflow: hidden;word-break: break-all;display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;}
</style>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">新闻列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="newsAdd.php"> 添加新闻</a> </li>
        <li>搜索：</li>
          <li style="padding-left: 10px;">关键字搜索：</li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="40" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th width="120">标题</th>
        <th>内容</th>
        <th width="120">数据来源</th>
        <th width="80">浏览量</th>
        <th width="10%">排序</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $bsql="SELECT * FROM news ORDER BY nid";
            $bresult=mysql_query($bsql);
            while($brow=mysql_fetch_assoc($bresult)){ ?>
                 <tr>
          <td style="text-align:left; padding-left:20px;">
           <?php echo($brow['nid']);?></td>
          <td><img src="../uploads/<?php echo($brow['npic']);?>" alt="" weight="100" height="100"/></td>
          <td><?php echo($brow['nname']);?></td>
           <td class="title"><?php echo($brow['ncontent']);?></td>
          <td><?php echo($brow['nsource']);?></td>
          <td><?php echo($brow['nread']);?></td>
          <td><?php echo($brow['nsort']);?></td>
          <td><?php echo($brow['ndate']);?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="newsUpdate.php?nid=<?php echo($brow['nid']);?>"><span class="icon-edit"></span> 修改</a> 
          	<a class="button border-red isdel" onclick="delNews(<?php echo($brow['nid']);?>);"><span class="icon-trash-o isdel"></span> 删除</a> </div></td>
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