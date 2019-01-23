$(this).ready(function() {
	//加
	$(".add").click(function () {
		var num = $(".pinventory").html();
		var sum = $("#buynum").val();
		sum*1 < 1*num ? sum++ : sum=num;
		$("#buynum").val(sum);
	});
	//减
	$(".lose").click(function () {
		var sum = $("#buynum").val();
		sum*1 > 1 ? sum-- : sum=1;
		$("#buynum").val(sum);
	});
	var num = $(".pinventory").html();
	var href = $(".addcart").attr("href");
	$("#buynum").keyup(function (event) {
		var sum = $("#buynum").val();
		//取整
		sum!=parseInt(sum)?sum=parseInt(sum):sum=parseInt(sum);
		$("#buynum").val(sum);
		//正则验证手动输入的是否为数字
		var yanzheng = /\d$/g;
		if(!(yanzheng.test(sum))){
			$("#buynum").val("1");
		}
		//小于0设为1
		
		if(sum*1 <= 0){
		$("#buynum").val("1");
		$(".pro3").css({opacity:"0"});
		$(".pro3 dd").html("");
		$(".addcart").attr("href","javascript:;");
		}else if(sum*1 > 1*num){//大于库存量
			event.preventDefault();
			$(".buy-now").css({background:"#818181",cursor:"not-allowed"});
			$(".addcart").css({background:"#818181",color:"#fff",cursor:"not-allowed"});
			$(".addcart").attr("href","javascript:;");
			$(".pro3").css({opacity:"1"});
			$(".pro3 dd").html("购买数超过库存量，请调整购买数!");
		}else{
			$(".buy-now").css({background:"#c00",cursor:"pointer"});
			$(".addcart").css({background:"#ffeded",color:"red",cursor:"pointer"});
			$(".pro3").css({opacity:"0"});
			$(".pro3 dd").html("");
			$(".addcart").attr("href",href);
			console.log(href)

		}
		
	});
	$('.addcart').click(function (){
		var num = $('#buynum').val();
		$('.addcart').attr("href",$('.addcart').attr('href')+"&&num="+num);
	});
});
