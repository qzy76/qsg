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
	<?php
		require_once("isAdmin.php");
		require_once("../connect.php");
		require_once("../functions.php");
		$ckaid=$_COOKIE['ckadid'];
		if($ckaid==""){
			header("location:index.php");
		}
		$sql_check="SELECT adsuper FROM admin where adid ='$ckaid' and adsuper = '1'";
		$result_check=mysql_query($sql_check);
		$result_row=mysql_fetch_assoc($result_check);
		if($result_row==""){
			js_go("您当前不是超级管理员","index.php");
		}
	?>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">管理员列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="adminAdd.php"> 添加管理员</a> </li>
        <li>搜索：</li>
        <if condition="$iscid eq">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value">
              <option value="index_tuan.php" selected="selected">管理员管理</option>
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
        <th>管理员ID</th>
        <th>昵称</th>
        <th>密码</th>
        <th>邮箱</th>
        <th>注册时间</th>
        <th>超级管理员</th>
        <th>操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $asql="SELECT * FROM admin limit 0,10";
            $aresult=mysql_query($asql);
            while($arow=mysql_fetch_assoc($aresult)){ ?>
                 <tr>
         <td><?php echo($arow['adid']);?></td>
         <td><?php echo($arow['adname']);?></td>
          <td>********</td>
          <td><?php echo($arow['ademail']);?></td>
          <td><?php echo($arow['addate']);?></td>
          <td><?php echo($arow['adsuper'])==1?"是":"否";?></td>
          <td><div class="button-group">
          	<a class="button border-main" href="adminUpdate.php?adid=<?php echo($arow['adid']);?>"><span class="icon-edit"></span> 修改</a>
          	<a class="button border-red" onclick="delAdmin(<?php echo($arow['adid']);?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
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