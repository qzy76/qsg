// JavaScript Document
$(document).ready(function(e) {
	var i = 0;
	var liLength = $("#pphd2 ul").children("li").length;
	var liwidth = $("#pphd2 ul").children("li").eq(2).width();
	var asd = liLength / 3;
	for(var aa = 0; aa < asd; aa++) {
		if(aa == 0) {
			$("#pphd1 ul").append("<li class='se'></li>");
		} else {
			$("#pphd1 ul").append("<li class=''></li>");
		}
	}
	$("#pphd1 ul").css("marginLeft",(1200-Math.ceil(asd)*40-10)/2)
	var hd = $("#pphd1 ul").children("li").length;
	var asf = liLength % 3;
	$("#pphd2 ul").css("width", liwidth * liLength - asd * 10);
	$("#pphd1 ul li").mouseenter(function(e) {
		$(this).addClass("se").siblings().removeClass("se");
		//改变ul位置
		var i = $(this).index();
		$("#pphd2 ul").stop().animate({
			left: -1200 * i - (i + 1) * 10
		}, 500);
		if(i == Math.floor(asd)) {
			$("#pphd2 ul").stop().animate({
				left: -1200 * i - (i + 1) * 10 + asf * liwidth+20
			}, 500);
		}
	});

	function mainpphd() {
//		console.log(i)
		i++;
		if(i < 0) {
			i = hd - 1;
		} else if(i > hd - 1) {
			i = 0;
		}
		$("#pphd1 ul li").eq(i).addClass("se").siblings().removeClass("se");
		$("#pphd2 ul").stop().animate({
			left: -1200 * i - (i + 1) * 10
		}, 500);
//		console.log(i)
		if(i == Math.floor(asd)) {
			$("#pphd2 ul").stop().animate({
				left: -1200 * i - (i + 1) * 10 + asf * liwidth+20
			}, 500);
		}
	};
	var clockpphd = setInterval(function() {
		mainpphd();
	}, 5000);
	$("#pphd2 ul li,#pphd1 ul li").mouseenter(function() {
		clearInterval(clockpphd);
	});
	$("#pphd2 ul li,#pphd1 ul li").mouseleave(function() {
		clockpphd = setInterval(function() {
			mainpphd();
		}, 5000);
	});
});