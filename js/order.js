$(document).ready(function(){
	$("#order-f2").click(function(){
		$("#order-float").css({display:"none"});
	});
	var num = $('.ordernum').length;
	for (i=0;i<num;i++) {
		var sum = $('.ordernum').eq(i).children('table').children('tbody').children('tr').length;
		var tr = $('.ordernum').eq(i).children('table').children('tbody').children('tr');
		var height = $('.ordernum').children('table').children('tbody').children('tr').height();
		$('.ordernum').eq(i).css('height',41+height*sum);
		if(sum>1){
			for(q=1;q<=sum;q++){
				tr.eq(q).children('th:nth-of-type(4)~').html("");
			}
		}
	}

});