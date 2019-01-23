$(this).ready(function(){
	var windowHeigth = $(window).height();
	$(window).scroll(function (){
	var allproLeft=$(".allpro").offset().left;
	var allproWeight=$(".allpro").width();
	var allproTop=$(".allpro").height();
		if($(document).scrollTop()>=600){
			$(".allpro").css({position:"fixed",top:"0px",left:allproLeft}).slideDown(2000);
			$(".main-hnav").css({position:"fixed",top:"-10px",left:allproLeft+allproWeight}).slideDown(2000);
			$(".hnav_cart").css({position:"fixed",top:"-10px",right:allproLeft}).slideDown(2000);
			$(".allpro").mouseover(function(){
				$(".finepro").css({position:"fixed",top:allproTop,left:allproLeft}).slideDown(1000);
				}).mouseout(function(){
					$(".finepro").mouseover(function(){
						$(".allproduct").css({position:"fixed",top:allproTop,left:allproLeft}).slideDown(2000);
						$(".fine_pro1").css({top:"-2px"});
					}).mouseout(function(){
						$(".allproduct").css({position:"",top:"",left:"0px"});
						$(document).scroll(function(){
						$(".finepro").stop().slideUp(500);
						});
					});
				});
		}else{
			$(".allpro").stop().css({position:"",top:"",left:""});
			$(".main-hnav").stop().css({position:"",top:"",left:""});
			$(".hnav_cart").stop().css({position:"",top:"",right:""});
			$(".allproduct").stop().css({position:"",top:"",left:""});
			$(".finepro").stop(true).css({display:"block",position:"",top:"",left:""});
			$(".allpro").mouseover(function(){
				$(".finepro").stop(true).css({display:"block",position:"",top:"",left:""});
			});
			$(".finepro").mouseover(function(){
				$(".finepro").stop(true).css({display:"block",position:"",top:"",left:""});
				$(".allproduct").stop(true).css({display:"block",position:"",top:"",left:""});
				$(".fine_pro1").stop(true).css({top:""});
			}).children('prolist').children('li');
		}
	});
	$(window).scroll(function() {
		if($(this).scrollTop() > $('.pphd').offset().top-(windowHeigth/2)) {
			$('.left_show').slideDown(500);
		} else {
			$('.left_show').slideUp(500);
		}
		$('.left_show ul li').click(function() {
			$('.left_show ul li').css({background:"#fff",color:"#666"});
			$(this).parent().children().css("color", "#666");
			$(this).siblings().removeClass('choose choose2');
			$(this).addClass('choose choose2');
		}).mouseenter(function() {
			$(this).addClass("choose").children().css("color", "#fff");
		}).mouseleave(function() {
			if(!$(this).hasClass("choose2")){
				$(this).removeClass('choose').children().css("color", "#666");
			}
		});
				var pphd=$(".pphd").length;
				for(var i=0;i<pphd; i++){
					if($(window).scrollTop()>$(".pphd").eq(i).offset().top-(windowHeigth/2)&&$(window).scrollTop()<$(".pphd").eq(i+1).offset().top){
						$('.left_show ul li').eq(i).children().css("color", "#fff");
						$('.left_show ul li').eq(i).siblings().children().css("color", "#666");
						$('.left_show ul li').eq(i).addClass("choose choose2").siblings().removeClass('choose choose2');
					}
				}
	});
	
	var num = $('.proclass a').length;
	for (i=0;i<num ;i++) {
		var li = "<li><a href='#profloor"+(i+1)+"'>"+$('.proclass a').eq(i).html()+"</a><span>></span></li>";
		$('.left_show ul').append(li);
	};
	$('.left_show').css("height",(num+2)*26+110);
});