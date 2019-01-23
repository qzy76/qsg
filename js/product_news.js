$(this).ready(function() {
	$('#myTab').children('li').click(function () {
		$(this).addClass('active').siblings().removeClass('active');
		var i = $(this).attr("data-val");
		i--;
		$('#myTabContent>div').eq(i).addClass('active').removeClass('fade').siblings().removeClass('active').addClass('fade');
	});
});
