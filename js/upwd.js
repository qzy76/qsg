$(function(){
	var i=1;
	var uid = "";
	$('.hidden').css({display:"none"});
	$('body').on("click",'.btn',function (){
		var uname=$('.uname').val();
		if(i==1){
			if(uname==""){
				$('.uname').next().html('用户名不能为空！');
			}else{
				$('.uname').next().html('');
				$.ajax({
					url:"ajaxcheckuname.php",
					type:"POST",
					data:{"uname":uname},
					success:function (k){
						if(k==0){
							$('.uname').next().html('用户名不存在！');
							return false;
						}else if(k==1){
							$('.uname').next().html('未设置密保，请联系管理员改密码！');
							return false;
						}else{
							arr=k.split("？");
							$('.tijiaoxiang').eq(0).remove();
							$('.main').css({height:"520px"});
							$('.da').eq(0).html(arr[0]+"?");
							$('.da').eq(1).html(arr[1]+"?");
							$('.da').eq(2).html(arr[2]+"?");
							uid = arr[3];//用户ID通过ajax查询后返回回来
							$('.tijiaoxiang').removeClass('hidden').show(100);
							i++
						}
					}
				});
			}
		}else if(i==2){
			var a1 =$('.a1').val();
			var a2 =$('.a2').val();
			var a3 =$('.a3').val();
			if(a1==""){
				$('.a1').next().html('答案不能为空！');
				return false;
			}else{
				$('.a1').next().html('');
			}
			if(a2==""){
				$('.a2').next().html('答案不能为空！');
				return false;
			}else{
				$('.a2').next().html('');
			}
			if(a2==""){
				$('.a3').next().html('答案不能为空！');
				return false;
			}else{
				$('.a3').next().html('');
			}
			a1=hex_sha1(a1);//密码sha1加密
			a2=hex_sha1(a2);
			a3=hex_sha1(a3);
			$.ajax({
				url:"ajaxMiCheck.php",
				type:"POST",
				data:{"a1":a1,"a2":a2,"a3":a3,"uid":uid},
				success:function (k){
					console.log(k)
					if(k=='404'){
						alert("请刷新重试!");
					}else if(k=='1'){
						$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
						$(".qzy-jindu").eq(1).addClass('active');
						$('.tijiaoxiang').eq(0).remove();
						$('.tijiaoxiang').eq(0).remove();
						$('.tijiaoxiang').eq(0).remove();
						$('.lable').eq(0).html('密 &nbsp; &nbsp; &nbsp; 码：');
						$('.tijiaoxiang').eq(1).remove();
						$('.lable').eq(1).html('确认密码：');
						$('.tijiaoxiang input').val('');
						i++;
					}else{
						$('.tijiaoxiang div:last').html('密保错误！');
					}
				}
			});
		}else if(i==3){
			var a2 =$('.a2').val();
			var a3 =$('.a3').val();
			if(a2==""){
				$('.a2').next().html('密码不能为空！');
				return false;
			}else{
				$('.a2').next().html('');
			}
			if(a3==""){
				$('.a3').next().html('密码不能为空！');
				return false;
			}else{
				$('.a3').next().html('');
			}
			if(a2!=a3){
				$('.a3').next().html('密码不一致！');
				return false;
			}
			var yanzheng = /(?=^.*?[a-z])(?=^.*?[A-Z])(?=^.*?\d)^(.{6,17})$/i;
		if(!(yanzheng.test(a2))){
				$('.a3').next().html('密码格式为6-17位，且含字母和数字!');
				return false;
		}else{
			upassword=hex_sha1(a2);//密码sha1加密
			$.ajax({
				url:"ajaxUpwdUpdate.php",
				type:"POST",
				data:{"upwd":upassword,"uid":uid},
				success:function (k){
					// console.log(k)
					if(k=='1'){
						$(".mTop ol li:nth-of-type(2) div:last-child").addClass('active1');
						$(".qzy-jindu").eq(2).addClass('active');
						$('.mbuttom').html('修改成功！<a href="login.php">点击跳转到登录页</a>');
					}else{
						$('.a3').next().html('修改失败，请刷新重试！');
					}
				}
			});
				
			}
		}
	});
});