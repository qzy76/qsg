function check(){//数据格式没问题时恢复按钮作用
	if($('#pass').val()==$('#pass2').val()&&$('#num').val().length>=3&&$('#pass').val().length>=6&&$('#veri').val().length==4){
		$('.log-btn').removeClass('off');
        $('button').attr("type","submit");
	}else{
        $('.log-btn').addClass('off');
        $('button').attr("type","button");
    };
};
function checkReg(){//检查账号是否被注册
	var uname = $('#num').val();
	if(uname!=""&&uname.length>=3){
		$.ajax({
			url: "checkUname.php",
			type: "POST",
			data: {"uname": uname},
			success: function(k) {
				if(k=="1"){
					$('#num').next().removeClass('hide').children('em').html("用户名已被注册！");
					$('.log-btn').addClass('off');
        			$('button').attr("type","button");
        			return false;
				}else{
					$('#num').next().addClass('hide').children('em').html("");
					$('.log-btn').removeClass('off');
        			$('button').attr("type","submit");
				}
			}
		});
	}
}
$(function(){
	$('#num').keyup(function(){ checkReg(); });
	$('#num').change(function(){ checkReg(); });
	$('button').click(function(){ checkReg(); });
});