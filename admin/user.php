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
    <div class="panel-head"><strong class="icon-reorder">用户列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="userAdd.php"> 添加用户</a> </li>
        <li>搜索：</li>
        <if condition="$iscid eq">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="window.location=this.value">
              <option value="index_tuan.php" selected="selected">用户管理</option>
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
        <th>用户ID</th>
        <th>昵称</th>
        <th>密码</th>
        <th>手机号</th>
        <th>邮箱</th>
        <th>密码安全性</th>
        <th>密保</th>
        <th>注册时间</th>
        <th>操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $usql="SELECT * FROM users limit 0,10";
            $uresult=mysql_query($usql);
            while($urow=mysql_fetch_assoc($uresult)){
            	$uid = $urow['uid'];
				 			$Msql="SELECT * FROM encrypted where euid = $uid";
							$Mresult=mysql_query($Msql);
							$Mrow=mysql_fetch_assoc($Mresult);
            	 ?>
                 <tr>
         <td><?php echo $uid;?></td>
         <td><?php echo($urow['uname']);?></td>
          <td>********</td>
          <td><?php if($urow['uphone']!=""){echo $urow['uphone'];}else{echo "空";}?></td>
          <td><?php echo($urow['uemail']);?></td>
          <td><?php echo($urow['usecurity'])==1?"好":"差";?></td>
          <td><?php echo($Mrow['euid'])!=""?"有":"无"; ?></td>
          <td><?php echo($urow['udate']);?></td>
          <td><div class="button-group">
          	<a class="button border-main" href="userUpdate.php?uid=<?php echo($urow['uid']);?>"><span class="icon-edit"></span> 修改</a>
          	<a class="button border-red" onclick="delUser(<?php echo($urow['uid']);?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
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