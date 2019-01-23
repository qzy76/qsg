<?php require_once("isAdmin.php");?><!DOCTYPE html>
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
<script src="js/qzy_class.js" type="text/javascript" charset="utf-8"></script>
<script src="js/qzy_classPro.js" type="text/javascript" charset="utf-8"></script>
<script src="js/qzy_choose.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">商品列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="goodsAdd.php"> 添加商品</a> </li>
        <li><input type="hidden" name="pid" id="pid" value="" /></li>
          <li>
            <if condition="$iscid eq">
						<script type="text/javascript">
						var strUrl = location.href;
						var arrUrl = strUrl.split("/");
						var strPage = arrUrl[arrUrl.length - 1];
						if(strPage == "productlist.php") {
							$("option:eq(0)").attr("selected", "selected");
						}
						if(strPage == "phot.php") {
							$("option:eq(1)").attr("selected", "selected");
						}
						if(strPage == "pnew.php") {
							$("option:eq(2)").attr("selected", "selected");
						}
						if(strPage == "psale.php") {
							$("option:eq(3)").attr("selected", "selected");
						}
						if(strPage == "index_tuan.php") {
							$("option:eq(4)").attr("selected", "selected");
						}</script>
						</if>
					<li>分类搜索：</li>
<select name="cid" class="input ajax1" style="width:100px; line-height:17px; float: left;">
	<option value="0" selected="selected">请选择分类</option>
	<?php
require_once("../connect.php");
$classsql="SELECT * FROM classification";
$classresult=mysql_query($classsql);
while($classrow=mysql_fetch_assoc($classresult)){
$cosort=$classrow['cosort'];
?>
<option value="<?php echo($classrow['coid']); ?>"><?php echo($classrow['coname']); ?></option>
<?php } ?>
</select>
<select name="cid" class="input ajax2" style="width:100px; line-height:17px; float: left; margin-left: 10px;"></select>
<select name="cid" class="input ajax3" style="width:100px; line-height:17px; float: left; margin-left: 10px;"></select>
          </li>
          <li style="padding-left: 10px;">搜索：</li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="20">ID</th>
         <th width="20%">商品名称</th>
        <th>图片</th>
        <th>价格</th>
        <th width="8%">优惠金额</th>
        <th width="3.8%">热销</th>
        <th width="3.8%">新品</th>
        <th width="3.8%">促销</th>
        <th width="3.8%">团购</th>
        <th width="5%">库存量</th>
        <th width="7%">所属分类</th>
        <th width="12%">截止时间(团购使用)</th>
        <th width="310">操作</th>
      </tr>
      <div id="vo" class="wenben">
        <?php
            require_once("../connect.php");
            $psql="SELECT pid,ppic,pname,price,preferential,phot,pnew,psale,ptuan,ccconame,psort,pcheck,pinventory FROM product inner join ccclassification on cccoid=pclassification ORDER BY pid";
            $presult=mysql_query($psql);
            while($prow=mysql_fetch_assoc($presult)){ ?>
          <tr>
          <td style="text-align:left; padding-left:20px;">
           <?php echo($prow['pid']);?></td>
           <td><?php echo($prow['pname']);?></td>
          <td><img src="../uploads/<?php echo($prow['ppic']);?>" alt="" width="50" height="50" /></td>
          <td><?php echo($prow['price']);?></td>
          <td> <?php echo($prow['preferential']);?></td>
          <td><?php echo($prow['phot'])==1?"是":"否";?></td>
          <td><?php echo($prow['pnew'])==1?"是":"否";?></td>
          <td><?php echo($prow['psale'])==1?"是":"否";?></td>
          <td><?php echo($prow['ptuan'])==1?"是":"否";?></td>
          <td><?php echo($prow['pinventory'])?></td>
          <td><?php echo($prow['ccconame']);?></td>
          <td><?php echo($prow['pcheck']);?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="goodsUpdate.php?pid=<?php echo($prow['pid']);?>"><span class="icon-edit"></span> 修改</a> 
          	<a class="button border-red" value="<?php echo($prow['pid']);?>" onclick="delpro()"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php }?>
        </div>
         
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>

</body>
</html>