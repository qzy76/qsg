$(function(){
				if($('.quan img').data('true')=="")$('.quan').css("opacity","0");
				if($('.active img').data('true')=="")$('.active').css("opacity","0");
				var num = $('.proImg2 h3').length;
				$('.right_show').css({height:num*30+130});
				for (i=0;i<num;i++) {
					var li = "<li><i class='icon iconfont qzy-dingwei1'></i><a href='#proSale0"
					+(i+2)+"'>"+$('.proImg2 h3').eq(i).text()+"</a></li>";
					$('.right_show ul').append(li);
				};
			});
			$(window).scroll(function () {
				if($(this).scrollTop()>$('.proSale01').offset().top-$(this).height()){
					$('.right_show').slideDown(500);
				}else{
					$('.right_show').slideUp(500);
				}
				if($(this).scrollTop()==0){
					$('.right_show').slideUp(500);
				}
				var num = $('.top').children().length-2
				$('.right_show').css({height:130+num*30})
				for(i=2;i<$('.top').children().length;i++){
					var blockTop = $('.top').children().eq(i);
					if($(window).scrollTop()+200>blockTop.offset().top&&$(window).scrollTop()<blockTop.offset().top+blockTop.height()){
						$('.right_show ul li').eq(i-2).css({background:"#2f0f63"}).siblings().css({background:"#8035fb"});;
					}
					$('.right_show ul li').mouseenter(function(){
						$(this).addClass("choose")
					}).mouseleave(function(){
						$(this).removeClass('choose')
					});
					$('.right_show ul li').click(function(){
						$('.right_show ul li').css({background:"#8035fb"});
						$(this).css({background:"#2f0f63"});
					});
				}
			});