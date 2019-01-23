$(this).ready(function(){
	//三级列表高度设置
	var apheight=$(".allpro").height();
	var fpheight=$(".finepro").height();
	//alert(apheight);
		$(".fine_pro1").css({height:fpheight,background:"#fafafa"});

	//三级列表显示与隐藏
	$(".prolist li").hover(function(){
		$(this).addClass("choose");
			$("h3",this).stop(true,true).animate({marginLeft:"5px"},400);
			$(".fine_pro1",this).stop(true,true).fadeIn(1000);
		},function(){
			$(this).removeClass("choose");
			$("h3",this).stop(true,true).animate({marginLeft:"0px"},300);
			$(".fine_pro1",this).stop(true,true).hide();
		});
	
	/*购物车*/
	$(".hnav_cart").mouseover(function(){
		$(".cart_pro").stop().slideDown(500);
		//alert("1");
	}).mouseout(function(){
		$(".cart_pro").stop().slideUp(500);
	});
});
