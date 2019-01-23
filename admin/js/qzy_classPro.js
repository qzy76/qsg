$(document).ready(function() {
	$(".ajax1").change(function() {
		var coid = $(this).val();
		$(".table").html("");
		$.get("ajaxSeach1.php", {
			coid: coid
		}, function(data) {
			addcon(data);
		}, "json");
	});
	$(".ajax2").change(function() {
		var coid1 = $(this).val();
		$(".table").html("");
		$.get("ajaxSeach2.php", {
			coid1: coid1
		}, function(data) {
			addcon(data);
		}, "json");
	});
	$(".ajax3").change(function() {
		var coid2 = $(this).val();
		$(".table").html("");
		$.get("ajaxSeach3.php", {
			coid2: coid2
		}, function(data) {
			addcon(data);
		}, "json");
	});
});

function addcon(data) {
	$(".table").append('<tr>' + '<th style="text-align:left; padding-left:20px;">ID</th>' +
		'<th width="20%">商品名称</th>' +
		'<th width="50">图片</th>' +
		'<th>价格</th>' +
		'<th width="6%">优惠金额</th>' +
		'<th width="4%">热销</th>' +
		'<th width="4%">新品</th>' +
		'<th width="4%">促销</th>' +
		'<th width="4%">团购</th>' +
		'<th width="10%">库存量</th>' +
		'<th>所属分类</th>' +
		'<th>截止时间(团购使用)</th>' +
		'<th>操作</th>' +
		'</tr>');
	$.each(data, function(index, value) {
		$(".table").append('<tr>' + '<td style="text-align:left; padding-left:20px;">' + (value.pid) + '</td>' +
			'<td>' + (value.pname) + '</td>' +
			'<td><img src="../uploads/' + (value.ppic) + '" alt="" width="50" height="50" /></td>' +
			'<td>' + (value.price) + '</td>' +
			'<td>' + (value.preferential) + '</td>' +
			'<td>' + ((value.phot) == 1 ? "是" : "否") + '</td>' +
			'<td>' + ((value.pnew) == 1 ? "是" : "否") + '</td>' +
			'<td>' + ((value.psale) == 1 ? "是" : "否") + '</td>' +
			'<td>' + ((value.ptuan) == 1 ? "是" : "否") + '</td>' +
			'<td>' + (value.pinventory) + '</td>' +
			'<td>' + (value.ccconame) + '</td>' +
			'<td>' + (value.pcheck) + '</td>' +
			'<td>' +
			'<div class="button-group">' +
			'<a class="button border-main" href="goodsUpdate.php?pid=' + value.pid + '"><span class="icon-edit"></span> 修改</a>' +
			'<a class="button border-red" value="' + (value.pid) + '" onclick="delpro()"><span class="icon-trash-o"></span> 删除</a></div></td>' +
			'</tr>');
	});
}