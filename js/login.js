$(function(){
	$('.code input').val("");//默认清空，验证失败时清空
	$('#pass').val("");//验证失败时清空
	$('.pos input').keyup(function () {
		$(this).val(remove($(this)));//调用function.js去除特殊符号
		$(this).val(len($(this),16));//限制长度为16
		$(this).next().addClass('hide');
	});
	$('.code input').keyup(function () {
		$(this).val(removeZimu($(this)));//去非字母
		$(this).val(len($(this),4));//限制长度为4
		$(this).next().removeClass('hide').next().addClass('hide');
	});
	$('input').keyup(function(){
		check();
	});
	$('button').click(function(){
		var unameH=$('#num').next().removeClass('hide').children('em');
		var passH=$('#pass').next().removeClass('hide').children('em');
		var passH2=$('#pass2').next().removeClass('hide').children('em');
		var veriH=$('#veri').next().next().removeClass('hide').children('em');
		if($('#num').val()==""){
			unameH.html("用户名不能为空");
		}else if($('#num').val().length<3){
			unameH.html("用户名长度小于三位");
		}else{
			unameH.html("");
			$('#num').next().addClass('hide');
		}
		if($('#pass').val()==""){
			passH.html("密码不能为空");
		}else if($('#pass').val().length<6){
			passH.html("密码长度小于六位");
		}else{
			passH.html("");
			$('#pass').next().addClass('hide');
		}
		if($('#pass').val()!=$('#pass2').val()){
			passH2.html("密码不一致");
		}else{
			passH2.html("");
			$('#pass2').next().addClass('hide');
		}
		if($('#veri').val()==""){
			veriH.html("验证码不能为空");
		}else if($('#veri').val().length !=4){
			veriH.html("验证码错误");
		}else{
			veriH.html("");
			$('#veri').next().next().addClass('hide');
		}
		check();
	});
	// 登录的回车事件
	$(window).keydown(function(event) {
    	if (event.keyCode == 13) {
    		$('.log-btn').trigger('click');
    	}
    });
});