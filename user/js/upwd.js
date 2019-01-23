$(function(){
	var i=1;
	$(".btn").click(function (){
		if(i==1){
			if($('.upwds').val()==""){
				$('.upwds').next().html('密码不能为空！');
				event.preventDefault();
			}else{
				$('.upwds').next().html('');
			}
		 var upassword=hex_sha1($('.upwds').val());//密码sha1加密
		$.ajax({
				url:"ajaxcheckupwd.php",
				type:"POST",
				data:{"upwd":upassword},
				success:function (k){
					console.log(k)
					if(k=='1'){
						$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
						$(".qzy-jindu").eq(1).addClass('active');
						$('.lable').html('新密码：');
						i++;
						$('.upwds').val('');
					}else{
						$('.upwds').next().html('密码错误！');
					}
				}
			});
	}else{
		var upwds =$('.upwds').val();
		if(upwds==""){
			$('.upwds').next().html('密码不能为空！');
			return false;
		}
		var yanzheng = /(?=^.*?[a-z])(?=^.*?[A-Z])(?=^.*?\d)^(.{6,17})$/i;
		if(!(yanzheng.test(upwds))){
				$('.upwds').next().html('密码格式为6-17位，且含字母和数字!');//event.preventDefault();
		}else{
			$('.upwds').next().html('');
			upassword=hex_sha1($('.upwds').val());//密码sha1加密
			$.ajax({
				url:"ajaxUpwdUpdate.php",
				type:"POST",
				data:{"upwd":upassword},
				success:function (k){
//					console.log(k)
					if(k=='1'){
						$(".mTop ol li:nth-of-type(2) div:last-child").addClass('active1');
					$(".qzy-jindu").eq(2).addClass('active');
					var num = 3;
					var dsq = setInterval(function() {
						if(num>1){
						$('.mbuttom').html('修改成功！<a href="userCenter.php">'+num+"秒后跳转到个人中心页，点击跳转</a>");
						num -= 1;
						}else{
							clearInterval(dsq);
						}
					},1000);
				function jumurl(){
					window.location.href = 'userCenter.php?p=0';
				}
				setTimeout(jumurl,num*1000);
					}else{
						alert('修改失败，请刷新重试！ ');
					}
				}
			});
			
		}
	}
	});
});