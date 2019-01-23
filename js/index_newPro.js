// JavaScript Document
$(document).ready(function(e) {
	var i = 0;
	var newProasd = $(".newPro").children("li").length;
	$(".newpronext").click(function() {
		i++;
		if(i > (newProasd - 5)) {
			i = newProasd - 5;
			$(".newpronext").css({cursor: "not-allowed"});
		} else {
			$(".newPro").animate({left: -244 * i}, 500);
		}
		if(i > 0) {
			$(".newprolast").css({cursor: "pointer"});
		}
		if(i > (newProasd - 6)) {
			$(".newpronext").css({	cursor: "not-allowed"});
		} else {
			$(".newpronext").css({	cursor: "pointer"});
		}

	});
	$(".newprolast").click(function() {
		i--;
		if(i < 0) {
			i = 0;
		} else {
			$(".newPro").animate({
				left: -244 * i
			}, 500);
		}

		if(i <= 0) {
			$(".newprolast").css({	cursor: "not-allowed"});
		} else {
			$(".newprolast").css({	cursor: "pointer"});
		}
		if(i < (newProasd - 4)) {
			$(".newpronext").css({	cursor: "pointer"});
		}

	});

});