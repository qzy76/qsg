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
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">广告列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="index_bannerAdd.php"> 添加广告</a> </li>
        
          <li style="padding-left: 10px;">关键字搜索：</li>
        
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th>标题</th>
        <th>链接</th>
         <th width="10%">排序</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $bsql="SELECT * FROM banner ORDER BY bsort";
            $bresult=mysql_query($bsql);
            while($brow=mysql_fetch_assoc($bresult)){ ?>
                 <tr>
          <td style="text-align:left; padding-left:20px;">
           <?php echo($brow['bid']);?></td>
          <td width="10%"><img src="../uploads/<?php echo($brow['bpic']);?>" alt="" width="100" height="50" /></td>
          <td><?php echo($brow['bname']);?></td>
           <td> <?php echo($brow['burl']);?></td>
          <td><?php echo($brow['bsort']);?></td>

          <td><?php echo($brow['bdate']);?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="index_bannerUpdate.php?bid=<?php echo($brow['bid']);?>"><span class="icon-edit"></span> 修改</a> 
          	<a class="button border-red isdel" onclick="delbanner(<?php echo($brow['bid']);?>)"><span class="icon-trash-o isdel"></span> 删除</a> </div></td>
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