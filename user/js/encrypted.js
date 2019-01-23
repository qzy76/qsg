$('body').ready(function() {
	var i = 1;
	var type = $('.type').val();
	$('.main').on("click", ".btn", function() {
		var email = $('.uemail').val();
		var upwds = $('.upwds').val();
		if(i == 1) {
			if(type == "1") {//未设置密保的
				if(email == "") {
					$('.uemail').next().html('邮箱不能为空！');
					return false;
				} else {
					var yanzheng = /^\w+@[^@]+\.[^@]+$/i;
					if(!(yanzheng.test(email))) {
						$('.uemail').next().html('邮箱格式错误!');
						return false;
					} else {
						$('.uemail').next().html('');
					}
				}
				if(upwds == "") {
					$('.upwds').next().html('密码不能为空！');
					return false;
				}
				var upassword = hex_sha1(upwds); //密码sha1加密
				$.ajax({
					url: "checkupwdAndEmail.php",
					type: "POST",
					data: {
						"upwd": upassword,
						"uemail": email
					},
					success: function(k) {
						if(k == '1') {
							$('.upwds').next().html('');
							$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
							$(".qzy-jindu").eq(1).addClass('active');
							$('.tijiaoxiang').eq(2).remove();
							$('.tijiaoxiang').eq(2).remove();
							$('.question').removeClass('hidden');;
							var text1 = $('.question').html();
							$('.question').append(text1);
							$('.question').append(text1);
							$('.q1').eq(1).html('问题二:');
							$('.a1').eq(1).html('答案二:');
							$('.q1').eq(2).html('问题三:');
							$('.a1').eq(2).html('答案三:');
							$('.tijiaoxiang').css({"margin-top": "5px","margin-bottom": "5px"});
							$('.tijiaoxiang:even').css({"margin-top": "10px"});
							i++;
							$('.main').on("change", ".qs1", function() {
								var values = $(this).val();//当前元素的value值
								var thisindex =$(this).children('option[value="'+values+'"]').index();//当前元素得位置
								var where = $(this).parent().index();//当前元素父类的位置
								where = where==2?1:where;//为2的时候位置为1
								where = where==4?2:where;//4的时候位置为2
								var q1index = $('.qs1').eq(0).children('option[value="'+values+'"]').index();
								var q2index = $('.qs1').eq(1).children('option[value="'+values+'"]').index();
								var q3index = $('.qs1').eq(2).children('option[value="'+values+'"]').index();
								var oldValues = $(this).attr('data-title');
								$(this).attr("data-title",thisindex);
								switch (where){
									case 0:
										if(oldValues!=thisindex){//选项修改时其他两个框还原
											$('.qs1').eq(1).children().eq(oldValues).show();
											$('.qs1').eq(2).children().eq(oldValues).show();
										}
										$('.qs1').eq(1).children().eq(q2index).hide();
										$('.qs1').eq(2).children().eq(q3index).hide();
										break;
									case 1:
										if(oldValues!=thisindex){
											$('.qs1').eq(0).children().eq(oldValues).show();
											$('.qs1').eq(2).children().eq(oldValues).show();
										}
										$('.qs1').eq(0).children().eq(q1index).hide();
										$('.qs1').eq(2).children().eq(q3index).hide();
										break;
									case 2:
										if(oldValues!=thisindex){
											$('.qs1').eq(0).children().eq(oldValues).show();
											$('.qs1').eq(1).children().eq(oldValues).show();
										}
										$('.qs1').eq(0).children().eq(q1index).hide();
										$('.qs1').eq(1).children().eq(q2index).hide();
										break;
									default:
									$('.qs1').children().show()
									break;
								}
							});
						} else {
							$('.upwds').next().html('邮箱或密码错误！');
						}
					}
				});
			} else {//设置了密保的
				var d1 = $('.anster').eq(0).val();
				var d2 = $('.anster').eq(1).val();
				var d3 = $('.anster').eq(2).val();
				var q1 = $('.q1').eq(0).next().val();
				var q2 = $('.q1').eq(1).next().val();
				var q3 = $('.q1').eq(2).next().val();
				$('.anster').next().html('');
				if(d1 == "") {
					$('.anster').eq(0).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(0).next().html('');
					d1=hex_sha1(d1);
				}
				if(d2 == "") {
					$('.anster').eq(1).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(1).next().html('');
					d2=hex_sha1(d2);
				}
				if(d3 == "") {
					$('.anster').eq(2).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(2).next().html('');
					d3=hex_sha1(d3);
				}
				var da1 = $('.anster').eq(0).val();//等不为空的时候再去获取一份，且不加密，用于插入成功时显示使用
				var da2 = $('.anster').eq(1).val();
				var da3 = $('.anster').eq(2).val();
				$.ajax({
				url: "ajaxMiUpdate.php",
				type: "POST",
				data: {"d1": d1,"d2": d2,"d3": d3},
				success: function(k) {
					if(k == 1) {
						$(".mTop ol li:nth-of-type(1) div:last-child").addClass('active1');
							$(".qzy-jindu").eq(1).addClass('active');
							$('.question').eq(1).remove();
							$('.question').eq(1).remove();
							$('.question').eq(1).remove();
							$('.question').removeClass('hidden');
							var text1 = $('.question').html();
							$('.question').append(text1);
							$('.question').append(text1);
							$('.q1').eq(1).html('问题二:');
							$('.a1').eq(1).html('答案二:');
							$('.q1').eq(2).html('问题三:');
							$('.a1').eq(2).html('答案三:');
							$('.tijiaoxiang').css({"margin-top": "5px","margin-bottom": "5px"});
							$('.tijiaoxiang:even').css({"margin-top": "10px"});
							i++;
							$('.main').on("change", ".qs1", function() {
								var values = $(this).val();//当前元素的value值
								var thisindex =$(this).children('option[value="'+values+'"]').index();//当前元素得位置
								var where = $(this).parent().index();//当前元素父类的位置
								where = where==2?1:where;//为2的时候位置为1
								where = where==4?2:where;//4的时候位置为2
								var q1index = $('.qs1').eq(0).children('option[value="'+values+'"]').index();
								var q2index = $('.qs1').eq(1).children('option[value="'+values+'"]').index();
								var q3index = $('.qs1').eq(2).children('option[value="'+values+'"]').index();
								var oldValues = $(this).attr('data-title');
								$(this).attr("data-title",thisindex);
								switch (where){
									case 0:
										if(oldValues!=thisindex){//选项修改时其他两个框还原
											$('.qs1').eq(1).children().eq(oldValues).show();
											$('.qs1').eq(2).children().eq(oldValues).show();
										}
										$('.qs1').eq(1).children().eq(q2index).hide();
										$('.qs1').eq(2).children().eq(q3index).hide();
										break;
									case 1:
										if(oldValues!=thisindex){
											$('.qs1').eq(0).children().eq(oldValues).show();
											$('.qs1').eq(2).children().eq(oldValues).show();
										}
										$('.qs1').eq(0).children().eq(q1index).hide();
										$('.qs1').eq(2).children().eq(q3index).hide();
										break;
									case 2:
										if(oldValues!=thisindex){
											$('.qs1').eq(0).children().eq(oldValues).show();
											$('.qs1').eq(1).children().eq(oldValues).show();
										}
										$('.qs1').eq(0).children().eq(q1index).hide();
										$('.qs1').eq(1).children().eq(q2index).hide();
										break;
									default:
									$('.qs1').children().show()
									break;
								}
							});
						
					} else {
					$('.anster').eq(2).next().html('验证失败！');
					}
				}
			});
			}
		} else {
				var w1 = $('.qs1').eq(0).data('title');
				var w2 = $('.qs1').eq(1).data('title');
				var w3 = $('.qs1').eq(2).data('title');
				var d1 = $('.anster').eq(0).val();
				var d2 = $('.anster').eq(1).val();
				var d3 = $('.anster').eq(2).val();
				var q1 = $('.qs1').eq(0).children().eq(w1).text();
				var q2 = $('.qs1').eq(1).children().eq(w2).text();
				var q3 = $('.qs1').eq(2).children().eq(w3).text();
				$('.anster').next().html('');
				if(d1 == "") {
					$('.anster').eq(0).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(0).next().html('');
					d1=hex_sha1(d1);
				}
				if(d2 == "") {
					$('.anster').eq(1).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(1).next().html('');
					d2=hex_sha1(d2);
				}
				if(d3 == "") {
					$('.anster').eq(2).next().html('答案不能为空');
					return false;
				}else{
					$('.anster').eq(2).next().html('');
					d3=hex_sha1(d3);
				}
				if(w1=="" || w2 == "" || w3 == "") {
					$('.anster').eq(2).next().html('有问题未选项！');
					return false;
				}else{
					$('.anster').eq(2).next().html('');
				}
				var da1 = $('.anster').eq(0).val();//等不为空的时候再去获取一份，且不加密，用于插入成功时显示使用
				var da2 = $('.anster').eq(1).val();
				var da3 = $('.anster').eq(2).val();
				$.ajax({
					url: "ajaxMiUpdate.php",
					type: "POST",
					data: {
						"w1": w1,"w2": w2,"w3": w3,"d1": d1,"d2": d2,"d3": d3,"type": "update"
					},
					success: function(k) {
						if(k == 1) {
							$(".mTop ol li:nth-of-type(2) div:last-child").addClass('active1');
							$(".qzy-jindu").eq(2).addClass('active');
									$('.mbuttom').html('修改成功！<a href="userCenter.php">点击跳转跳转到个人中心页</a>');
									$('.mbuttom').append('<p>问题一：'+q1+"答案一："+da1+'</p>');
									$('.mbuttom').append('<p>问题二：'+q2+"答案二："+da2+'</p>');
									$('.mbuttom').append('<p>问题三：'+q3+"答案三："+da3+'</p>');
									$('.mbuttom').append('<p>请牢记密保！</p>');
						} else {
							alert('添加失败，请刷新重试！ ');
						}
					}
				});
			
		}
	});
});