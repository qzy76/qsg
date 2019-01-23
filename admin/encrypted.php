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
</head>
<body>
	<?php
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
			js_go("您当前不是超级管理员","admin.php");
		}
	?>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">密保列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="equestionAdd.php"> 添加密保</a> </li>
        <li>搜索：</li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>密保序号</th>
        <th>密保名称</th>
        <th>有无用户使用</th>
        <th>操作</th>
      </tr>
      <volist name="list" id="vo">
        <?php
            require_once("../connect.php");
            $usql="SELECT * FROM equestion";
            $uresult=mysql_query($usql);
            while($urow=mysql_fetch_assoc($uresult)){
            	$qid = $urow['qid'];
							$csql="SELECT * FROM encrypted where questions1 =$qid or questions2 =$qid or questions3 =$qid";
            	$cresult=mysql_query($csql);
							$crow=mysql_fetch_assoc($cresult);
            	?>
                 <tr>
         <td><?php echo($urow['qid']);?></td>
          <td><?php echo($urow['qtitle']);?></td>
          <td><?php echo($crow['euid'])!=""?"有":"无"; ?></td>
          <td><div class="button-group">
          	<a class="button border-red" onclick="delMi(<?php echo($urow['qid']);?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
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