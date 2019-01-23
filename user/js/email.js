$(function(){
	var i=1;
	$("body").on("click",".btn",function (){
		if(i==1){
			if($('.upwds').val()==""){
				$('.upwds').next().html('密码不能为空！');
				return;
			}else{
				$('.upwds').next().html('');
			}
			var upassword=hex_sha1($('.upwds').val());//密码sha1加密
			$.ajax({
				url:"ajaxcheckupwd.php",
				type:"POST",
				data:{"upwd":upassword},
				success:function (k){
					if(k=='1'){
						$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
						$(".qzy-jindu").eq(1).addClass('active');
						$('.upwds').val('').addClass('email').removeClass('upwds').attr('type','text').attr('onfocus','');
						$('.lable').html('邮箱号：');
						i++;
					}else{
						$('.upwds').next().html('密码错误！');
					}
				}
			});
		}else{
			var email =$('.email').val();
			if(email==""){
				$('.email').next().html('邮箱号不能为空！');
				event.preventDefault();
			}
			var yanzheng = /^\w+@[^@]+\.[^@]+$/i;
			if(!(yanzheng.test(email))){
					$('.email').next().html('邮箱格式错误！');//event.preventDefault();
			}else{
				$('.email').next().html('');
				$.ajax({
					url:"ajaxEmailAdd.php",
					type:"POST",
					data:{"email":email},
					success:function (k){
						console.log(k)
						if(k=='1'){
							$(".mTop ol li:nth-of-type(2) div:last-child").addClass('active1');
							$(".qzy-jindu").eq(2).addClass('active');
							$('.mbuttom').html('修改成功！<a href="userCenter.php">点击跳转到个人中心页</a>');
						}else{
							alert('修改失败，请刷新重试！ ');
						}
					}
				});
			}
		}
	});
	$('.main').css("height","260px");
});