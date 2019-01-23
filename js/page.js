$(function() {
	var windowWidth = $(window).width();
	var b = $(".quan img").width();
	var d = $(".SaleImg").width();
	var e = $(".SaleImg").height();
	var autoLeft=(windowWidth-1000)/2
	
	var proImgleft=(windowWidth-d)/2;
	$(".proImg2").css({marginLeft:proImgleft,width:d,height:e});
	$(".proImg2 h3").css({paddingTop:(e-80)/2});
	//段落P为空时h3独占两行大小
	for (var i=0;i<$(".proImg2").length;i++) {
		if($(".proImg2").eq(i).children("p").text()==""){
//			console.log($(".proImg2").eq(i).children("h3").text())
			$(".proImg2").eq(i).children("h3").css({fontSize: 70,lineHeight:"80px",fontWeight: 600,paddingTop:(e-80)/2});
		}
	}
	
});