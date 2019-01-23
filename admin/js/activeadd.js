$(function(){
	var title = $("input[name='aurl']").val();
	var sy = $('input:last').val();
	$("input[name='isok']").change(function(){
		if($(this).val()=="1"){
			$("input[name='aurl']").val(title);
			$("input[name='aurl']").attr("readonly","readonly");
			$('input:last').val(sy).parent().parent().animate({opacity:"1"});
		}else{
			$("input[name='aurl']").val("");
			$("input[name='aurl']").removeAttr("readonly");
			$('input:last').val("0").parent().parent().animate({opacity:"0"});
		};
	});
});
