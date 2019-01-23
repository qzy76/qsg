//添加区域数
var sum=8;//将最大区域量设为全局变量
function addoption(){
	//当前区域未添加商品不给增加区域
	var i = $(".addoption").children('option').length;
	var i = $('.addoption').children(":selected").val();
	if($('.ck').length<i){
		$('.addsec').html("区域"+i+"未添加商品!");
		//将未添加商品的添加为默认选择
		$('.addoption').children().removeAttr('selected');
		$('.addoption').children().last().attr('selected');
		$('.addsec').css("padding-left","10px");
		return;
	};
	i++
	//可添加的最大量
	if(i>sum){
		$('.addsec').html("为了避免页面篇幅过长，区域数不能超过"+sum+"!");
		return;
	}
	//当区域数为sum时，鼠标移开该按钮，清空
	if(i==sum){
		$(".addoption").next().mouseout(function(){
			$('.addsec').html('');
		});
	}
	//先移除所有的选中
	$(".addoption").children().removeAttr("selected");
	//将添加的设为选中
	$(".addoption").append("<option selected="+"selected"+" value="+i+">区域"+i+"</option>")
	var num=2;
	//设置定时器，n秒后清除提示内容
	var addsuccessful=setInterval(function(){
		$('.addsec').html("添加成功!"+num+"s");
		num--
		if(num<=-1){
		clearInterval(addsuccessful);
		$('.addsec').html('');
		}
	},1000);
}
$(function(){
	//如果是手动添加按钮点击执行，函数调用不执行
	$('.addBlock').mouseover(function(){
		$('.addsec').css("padding-left","10px");
//		alert("1")
	}).mouseout(function(){
		$('.addsec').html("");
	});
	$('option').dblclick(function(){
		var id = $(this).val();
		window.open("../product.php?pid="+id);
	});
	
	//点击全部添加
	$('.aDseaver span:first').click(function(){
		$(".chooseP option").appendTo($('.choosepro'));
	});
	//点击部分添加
	$('.aDseaver span:eq(1)').click(function(){
		$(".chooseP option:selected").appendTo($('.choosepro'));
	});
	//点击全部取消添加
	$('.aDseaver span:eq(2)').click(function(){
		$(".choosepro option").appendTo($('.chooseP'));
	});
	//点击部分取消添加
	$('.aDseaver span:eq(3)').click(function(){
		$(".choosepro option:selected").appendTo($('.chooseP'));
	});
	//点击确认，添加商品
	//记录第几次点击
	var isfirst=0;
	$('.isOK span:first').click(function(){

		var whois = $('.addoption').children(":selected").val();
		//添加商品时所选区域已经有商品了，提示并停止操作
		if($('.ck').length>=whois){
			$('.addsec').html("区域"+whois+"已添加商品，请修改区域！");
			$('.addsec').css("padding-left","170px");
		return;
		}
		
		$('.addsec').css("padding-left","300px");
		//记录有效点击数，检查已添加的区域数，如果有添加才算有效点击
		var hasfirst = $('.ck').length;
		hasfirst==0?null:isfirst++;
	//区域值
	var block = $('.addoption').val();
	//当前未添加商品不给保存
	if($('.choosepro').html()==""){
		$('.addsec').css("padding-left","300px");
		$('.addsec').html("商品不能为空!");
		return;
	}
	//标题1、2
	var paproname1 = $('.paproname1').val();
	var paproname2 = $('.paproname2').val();
	//如果提交的时候标题1为空，弹出提示输入选择框
	if(isfirst>0&&paproname1==""){
		var write = prompt("请输入区域"+whois+"的标题1"+ "\n" +"必填项");
		if(write!=""){
			paproname1=write;
		}else{
			return;
		}
	}
	if(isfirst>0&&paproname2==""){
		var write = prompt("是否输入区域"+whois+"的标题2?"+ "\n" +"如不填写则直接点确定按钮");
		if(write!=null){
			paproname2=write;
		}else{
			return;
		}
	}
	//添加的数量
	var num = $('.choosepro option').length;
	var saleId="";
	for (i=0;i<num;i++) {
		if(i==0){
		saleId+=$('.choosepro option').eq(i).attr("value");
		}else{
		saleId+=","+$('.choosepro option').eq(i).attr("value");
		}
	}
	//保存每次生成的字段
//	var whatSale = "{'"+block+"','"+paproname1+"',paproname2:'"+paproname2+"',["+saleId+"]} ";
	var whatSale = "{'"+block+"','"+paproname1+"','"+paproname2+"',["+saleId+"]} ";
//	console.log(whatSale);
	$('.whatSale select').append("<option>"+whatSale+"</option>")
	//将所有的字段保存在标签内
	var whatSaleAll =$('.whatSale select').text()
	whatSaleAll = whatSaleAll.substr(0,whatSaleAll.length-1);
	$('.whatSaleAll').val(whatSaleAll);
//	console.log(whatSaleAll);
	//没有填写时填“空”
	paproname1==""?paproname1="标题为空":null;
	paproname2==""?paproname2="标题为空":null;
	saleName="<div class='ck'><p>区域"+block+"：</p><p>标题1：<name>"+paproname1+
	"</name></p><p>标题2：<name>"+paproname2+"</name></p>"+"<span>所选商品：</span>"+
	"<select multiple>"+$('.choosepro').html()+"</select></div>";
	//将获取的追加给$('.ischoose')
	$('.ischoose').append(saleName);
	//清除已选/写的值
	$('.choosepro').html("");
	$('.paproname1').val('');
	$('.paproname2').val('');
	if($('.addoption option').length<sum){		
		addoption();
	}
	}).mouseout(function(){
		$('.addsec').html("");
	});
	
	//点击修改按钮
	var isupdate=0;
	$('.isOK span:last').click(function(){
		var i = $('.addoption').children(":selected").val();
		if($('.ck').length<($('.addoption').children().length-1)){
			$('.addsec').css("padding-left","260px");
			$('.addsec').html("区域"+i+"未添加商品!");
			//将未添加商品的添加为默认选择
			$('.addoption').children().removeAttr('selected');
			$('.addoption').children().last().attr('selected');
			return;
		}
		if(i>$('.ck').length){
			$('.addsec').html("区域"+i+"未添加商品！");
			$('.addsec').css("padding-left","170px");
			return;
		}
//		var hasNum = $('.addoption').children().length;
		//所选区域数小于或等于添加数执行
		if(isupdate==0&&i<=$('.ck').length){
//			alert(i)
			//点了后将原来有的商品还回去
			$(".choosepro option").appendTo($('.chooseP'));
			
			var title1 = $('.ck').eq(i).children('p:eq(1)').children('name').html();
			var title2 = $('.ck').eq(i).children('p:eq(2)').children('name').html();
			title1 == "标题为空"?title1=null:null;
			title2 == "标题为空"?title2=null:null;
			$('.paproname1').val(title1);
			$('.paproname2').val(title2);
			//将区域内的商品显示在该区域
			$('.choosepro').html($('.ck').eq(i-1).children('select').html());
			$('.isOK span:last').html("保存修改").css("background","red");
			//选择后点击保存清空的逻辑操作在此括号外
			isupdate=1;
		}else{
			$('.isOK span:last').html("修改选中").css("background","#08bbe1");
			//重新获取值
			var title1 = $('.paproname1').val();
			var title2 = $('.paproname2').val();
			//如果提交的时候标题1为空，弹出提示输入选择框
			if(i!=0&&title1==""){
				var write = prompt("请输入区域标题1");
				if(write!=""){
					title1=write;
				}else{
					return;
				}
			}
			if(i!=0&&title2==""){
				var write = prompt("是否输入区域标题2?"+ "\n" +"如不填写则直接点确定按钮");
				if(write!=null){
					title2=write;
				}else{
					return;
				}
			}
			//重新赋值
			$('.ck').eq(i).children('p:eq(1)').children('name').html(title1);
			$('.ck').eq(i).children('p:eq(2)').children('name').html(title2);
			var newChoose=$('.choosepro').html();
			$('.ck').eq(i).children('select').html("");
			$('.ck').eq(i).children('select').html(newChoose);
			$('.choosepro').html("");
			isupdate=0;
		}
	}).mouseout(function(){
		$('.addsec').html("");
	});
	//修改已经选的商品后点击确定时清空
	$('.choosepro').change(function(){
		$('.isOK span:last').click(function(){
			$('.choosepro').html("");
		});
	});
});