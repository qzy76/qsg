//搜索
function changesearch(){	
		
}
//删除首页分类楼层跳转
function delmainClass(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="MainclassDelete.php?cBid="+id;
	}else{
		return;
	}
}
//删除新品跳转
function delchoosePnew(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="pnewDelete.php?pid="+id;
	}else{
		return;
	}
}
//删除热销跳转
function delchoosePhot(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="photDelete.php?pid="+id;
	}else{
		return;
	}
}
//删除促销跳转
function delchoosePsale(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="psaleDelete.php?pid="+id;
	}else{
		return;
	}
}
//删除团购跳转
function delchoosePtuan(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="index_tuanDelete.php?pid="+id;
	}else{
		return;
	}
}
//删除新品跳转
function delchoosePnew(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="pnewDelete.php?pid="+id;
	}else{
		return;
	}
}
//删除新闻跳转
function delNews(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="newsDelete.php?nid="+id;
	}else{
		return;
	}
}
//删除评价跳转
function delpingjia(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="evaluationDelete.php?eid="+id;
	}else{
		return;
	}
}
//删除用户跳转
function delUser(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="userDelete.php?uid="+id;
	}else{
		return;
	}
}
//删除密保跳转
function delMi(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="encryptedDelete.php?eid="+id;
	}else{
		return;
	}
}
//删除管理员跳转
function delAdmin(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="adminDelete.php?uid="+id;
	}else{
		return;
	}
}
//细分类删除跳转
function delclass(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="ccclassificationDelete.php?cccoid="+id;
	}else{
		return;
	}
}
//小分类删除跳转
function delclass1(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="cclassificationDelete.php?ccoid="+id;
	}else{
		return;
	}
}
//大分类删除跳转
function delclass2(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="classificationDelete.php?coid="+id;
	}else{
		return;
	}
}
//商品单个删除
function delpro(){
	var a = confirm("您确定要删除吗?")
	var b=$(".border-red").attr('value');
	if(a==true){
		window.location.href="goodsDelete.php?pid="+b;
	}else{
		return;
	}
}
//banner删除
function delbanner(id){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="index_bannerDelete.php?bid="+id;
	}else{
		return;
	}
}
//热销商品单个删除
function isdelHot(){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="photDelete.php?pid="+$(".border-red").attr('value');
	}else{
		return;
	}
}
//新商品单个删除
function isdelNew(){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="pnewDelete.php?pid="+$(".border-red").attr('value');
	}else{
		return;
	}
}
//促销商品单个删除
function isdelSale(){
	var a = confirm("您确定要删除吗?")
	if(a==true){
		window.location.href="psaleDelete.php?pid="+$(".border-red").attr('value');
	}else{
		return;
	}
}
//全选
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

//批量删除
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
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}