$(function(){
	var updatehtml = $('.update').children('input').val();
//	console.log(updatehtml);
	for (i=2;i<=updatehtml.split(' ').length;i++) {
		$(".addoption").append("<option value="+i+">区域"+i+"</option>")
		$(".addoption").children().removeAttr("selected");
	}
});
