$(this).ready(function() {
	//团购倒计时
	var end1 = $(".times").val();
	var now1 = new Date(); //当前用户系统时间
	var end = new Date(end1);
	var date3 = end.getTime() - now1.getTime() //时间差的毫秒数
	var tuan = setInterval(function() {
		//计算出相差天数
		var days = Math.floor(date3 / (24 * 3600 * 1000))
		//计算出小时数
		var leave1 = date3 % (24 * 3600 * 1000) //计算天数后剩余的毫秒数
		var hours = Math.floor(leave1 / (3600 * 1000))
		//计算相差分钟数
		var leave2 = leave1 % (3600 * 1000) //计算小时数后剩余的毫秒数
		var minutes = Math.floor(leave2 / (60 * 1000))
		//计算相差秒数
		var leave3 = leave2 % (60 * 1000) //计算分钟数后剩余的毫秒数
		var seconds = Math.round(leave3 / 1000)
		if(hours < 10) {
			hours = "0" + hours;
		}
		if(minutes < 10) {
			minutes = "0" + minutes;
		}
		if(seconds < 10) {
			seconds = "0" + seconds;
		}
		$('.days').html(days);
		$('.hours').html(hours);
		$('.minutes').html(minutes);
		$('.seconds').html(seconds);
		date3 -= 1000;
	}, 1000);
	var title = $('.pro_type').html();
	if(date3 < 1000&&title=="团购商品") {
		
			$('.days').html("&nbsp;&nbsp;0");
			$('.hours').html("00");
			$('.minutes').html("00");
			$('.seconds').html("00");
			clearInterval(tuan);
			$(".pro3").css({
				opacity: "1"
			});
			$(".pro3 dd").html("团购结束，请购买其他商品!");
		}else{
			$('.pro_tuan div').remove()
		}
		var title1 = $('.tuan_jia').html();
		console.log(title1)
		if(title1=="在  售  价：") {
			$('.pro_tuan').remove()
		}
});