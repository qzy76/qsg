$(function(){
	var i=1;
	$(".btn").click(function (){
		var email = $('.uemail').val();
		var upwds = $('.upwds').val();
		if(i==1){
			if(email==""){
				$('.uemail').next().html('邮箱不能为空！');
					return false;
			}else{
				var yanzheng = /^\w+@[^@]+\.[^@]+$/i;
				if(!(yanzheng.test(email))){
						$('.uemail').next().html('邮箱格式错误!');
						return false;
				}else{ 	$('.uemail').next().html(''); 	}
			}
			if(upwds==""){
				$('.upwds').next().html('密码不能为空！');
				event.preventDefault();
			}else{ 	$('.upwds').next().html(''); 	}
		 var upassword=hex_sha1(upwds);//密码sha1加密
			$.ajax({
				url:"checkupwdAndEmail.php",
				type:"POST",
				data:{"upwd":upassword,"uemail":email},
				success:function (k){
						if(k=='1'){
							$('.upwds').next().html('');
							$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
							$(".qzy-jindu").eq(1).addClass('active');
							$('.uemail').val('').addClass('uphone').removeClass('uemail');
							$('.lable').html('手机号：');
							$('.lable').next().prop({"placeholder":"请输入您的手机号","type":"text","onfocus":"false"});
							$('.lable').parent().next().html('验证成功!').animate({"opacity":"0"},1000).html('');
							i++;
						}else{
							$('.upwds').next().html('邮箱或密码错误！');
						}
				}
			});
		}else{
		var uphone =$('.uphone').val();
		if(uphone==""){
			$('.uphone').next().html('手机不能为空！');
			event.preventDefault();
		}
		var yanzheng =  /^1[3,5,6,8,9]{1}\d{9}$/g;//手机号首位为1；第二位为3/5/6/8/9，
		if(!(yanzheng.test(uphone))){
				$('.uphone').next().html('手机号码错误!');
				return false;
		}else{
			$.ajax({
			url:"ajaxPhoneUpdate.php",
				type:"POST",
				data:{"uphone":uphone},
				success:function (k){
						if(k==1){
					$(".mTop ol li:nth-of-type(2) div:last-child").addClass('active1');
					$(".qzy-jindu").eq(2).addClass('active');
					var num = 10;
					var dsq = setInterval(function() {
						if(num>1){
						$('.mbuttom').html('修改成功！<a href="userCenter.php">'+num+"秒后跳转到个人中心页，点击跳转</a>");
						num -= 1;
						}else{
							clearInterval(dsq);
						}
					},1000);
					function jumurl(){
						window.location.href = 'userCenter.php';
					}
						setTimeout(jumurl,num*1000);
					}else{
						alert('添加失败，请刷新重试！ ')
					}
				}
			});
		}
	}
	});
	$('.main').css("height","270px");
});