$(function() {
	for(var i = 0; i < $(".floornum").length; i++) {
		$(".greatpush").eq(i).mousemove(function() {
			$(this).parent().parent().next().children(".productMainnew").css({display: "none"});
			$(this).parent().parent().next().children(".productMainpush").css({display: "block"});
			$(this).css({background: "#fff",borderBottom: "1px solid #fff",
				color: "red",borderLeft: "1px solid #000",borderTop: "1px solid #000"});
			$(this).next().css({background: "#eee",borderBottom: "1px solid #000",color: "#444",
				borderRight: "1px solid #AAAAAA",borderTop: "1px solid #AAAAAA"});
		});
		$(".newpro").eq(i).mousemove(function() {
			$(this).parent().parent().next().children(".productMainpush").css({display: "none"});
			$(this).parent().parent().next().children(".productMainnew").css({display: "block"});
			$(this).prev().css({background: "#eee",borderBottom: "1px solid #000",color: "#444",
				borderLeft: "1px solid #AAAAAA",borderTop: "1px solid #AAAAAA"});
			$(this).css({background: "#fff",borderBottom: "1px solid #fff",color: "red",
				borderRight: "1px solid #000",borderTop: "1px solid #000"});
		});
	}
});