$(document).ready(function() {
	var i = 0;
	$("#banner .bannerlist").children("li").eq(0).clone().appendTo($("#banner .bannerlist"));
	var hd = $(".bannerlist").children("li").length;
	var asd = hd - 1;
	for(var aa = 0; aa < asd; aa++) {
		if(aa == 0) {
			$("#banner .bannernav").append("<li class='cur'></li>");
		} else {
			$("#banner .bannernav").append("<li class=''></li>");
		}
	}
	//banner图片宽度设置
	var Weight = $("#banner").width();
	$("#banner .bannerlist li a img").css({
		width: Weight
	});
	var Height = $("#banner .bannerlist li a img").height();
	$("#banner").css({
		height: Height
	});
	var Height = $("#banner .bannerlist li a img").height();
	var bHeight = $("#goods_home #banner span.pre").height();
	$("#goods_home #banner span.pre,span.next").css({
		top: (Height - bHeight) / 2
	});
	$(".next").stop(true).click(function() {
		i++;
		if(i > asd - 1) {
			i = 0;
		}
		showpic();
	});
	$(".pre").stop(true).click(function() {
		i--;
		if(i < 0) {
			i = asd - 1;
		}
		showpic();
	});

	$(".bannernav li").stop(true).mouseenter(function() {
		i = $(this).index();
		showpic();
	});

	function showpic() {
		$(".bannernav .cur").removeClass("cur");
		$(".bannernav li").eq(i).addClass("cur");

		$("#banner .bannerlist").stop(true).animate({
			left: "-" + Weight * i + "px"
		}, 600);
	};

	function showpica() {
		i++;
		if(i < 0) {
			i = asd - 1;
		} else if(i > asd - 1) {
			i = 0;
		}
		showpic();
	}

	var clockq = setInterval(function() {
		showpica();
	}, 5000);
	$(".bannerlist").mouseover(function() {
		clearInterval(clockq);
		$("#banner span.pre").css({
			display: "block",
			opacity: "1",
			transition: "all 0.3s"
		});
		$("#banner span.next").css({
			display: "block",
			opacity: "1",
			transition: "all 0.3s"
		});
		$("#banner span.pre").animate({
			left: "1%"
		}, 100);
		$("#banner span.next").animate({
			right: "1%"
		}, 100);

	}).mouseleave(function() {
		clockq = setInterval(function() {
			showpica();
		}, 5000);
		$("#banner span.pre").css({
			display: "none",
			opacity: "0",
			transition: "all 0.3s"
		});
		$("#banner span.next").css({
			display: "none",
			opacity: "0",
			transition: "all 0.3s"
		});
		$("#banner span.pre").css({ left: "5%" });
		$("#banner span.next").css({ right: "5%" });
	});
	$(".bannernav").mouseover(function() {
		clearInterval(clockq);
	}).mouseleave(function() {
		clockq = setInterval(function() {
			showpica();
		}, 5000);
	});
	$("#banner span").stop(true).mouseover(function() {
		$("#banner span.pre").css({ display: "block",opacity: "1" });
		$("#banner span.next").css({ display: "block",opacity: "1" });
		$("#banner .pre").css({ left: "1%" });
		$("#banner .next").css({ right: "1%" });
		clearInterval(clockq);
	}).mouseleave(function() {
		clockq = setInterval(function() {
			showpica();
		}, 5000);
	});
});
//图片原始尺寸获取
function getImageWidth(url, callback) {
	var img = new Image();
	img.src = url;

	// 如果图片被缓存，则直接返回缓存数据
	//https://www.zhihu.com/question/28733200
	if(img.complete) {
		callback(img.width, img.height);
	} else {
		// 完全加载完毕的事件
		img.onload = function() {
			callback(img.width, img.height);
		}
	}

}