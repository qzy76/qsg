//star
$(document).ready(function(){
	var i = "";
	var n="";
		$('.stars i').hover(function(){
			n = $(this).attr('data-title');
			switch (n){
				case "1":
					$(this).parent().children('i').first().addClass('choose').siblings().removeClass('choose');
					$(this).parent().children('b').html("失望");
					break;
				case "2":
					$(this).parent().children('i').removeClass('choose').first().addClass('choose');
					$(this).parent().children('i').first().next().addClass('choose');
					$(this).parent().children('b').html("不满");
					
					break;
				case "3":
					$(this).parent().children('i').addClass('choose').last().prev().removeClass('choose');
					$(this).parent().children('i').last().removeClass('choose');
					$(this).parent().children('b').html("一般");
					
					break;
				case "4":
					$(this).parent().children('i').addClass('choose').last().removeClass('choose');
					$(this).parent().children('b').html("满意");
					
					break;
				case "5":
					$(this).parent().children('i').addClass('choose');
					$(this).parent().children('b').html("惊喜");
					
					break;
				default:
					$(this).parent().children('i').removeClass('choose');
					$(this).parent().children('b').html("");
					break;
			}
		}).mouseout(function(){
			switch (i){
				case "1":
					$(this).parent().children('i').first().addClass('choose').siblings().removeClass('choose');
					$(this).parent().children('b').html("失望");
					
					break;
				case "2":
					$(this).parent().children('i').removeClass('choose').first().addClass('choose');
					$(this).parent().children('i').first().next().addClass('choose');
					$(this).parent().children('b').html("不满");
					
					break;
				case "3":
					$(this).parent().children('i').addClass('choose').last().prev().removeClass('choose');
					$(this).parent().children('i').last().removeClass('choose');
					$(this).parent().children('b').html("一般");
					
					break;
				case "4":
					$(this).parent().children('i').addClass('choose').last().removeClass('choose');
					$(this).parent().children('b').html("满意");
					
					break;
				case "5":
					$(this).parent().children('i').addClass('choose');
					$(this).parent().children('b').html("惊喜");
					
					break;
				default:
					$(this).parent().children('i').removeClass('choose');
					$(this).parent().children('b').html("");
					break;
				}
		}).click(function(){
			n = $(this).attr('data-title');
			$(this).parent().next().val(n);
			switch (n){
				case "1":
					$(this).parent().children('i').first().addClass('choose').siblings().removeClass('choose');
					i ="1";
					$(this).parent().children('b').html("失望");
					
					break;
				case "2":
					$(this).parent().children('i').removeClass('choose').first().addClass('choose');
					$(this).parent().children('i').first().next().addClass('choose');
					$(this).parent().children('b').html("不满");
					
					i ="2";
					break;
				case "3":
					$(this).parent().children('i').addClass('choose').last().prev().removeClass('choose');
					$(this).parent().children('i').last().removeClass('choose');
					$(this).parent().children('b').html("一般");
					i ="3";
					break;
				case "4":
					$(this).parent().children('i').addClass('choose').last().removeClass('choose');
					$(this).parent().children('b').html("满意");
					
					i ="4";
					break;
				case "5":
					$(this).parent().children('i').addClass('choose');
					$(this).parent().children('b').html("惊喜");
					i ="5";
					break;
				default:
					$(this).addClass('choose');
					$(this).parent().children('b').html("");
					break;
			}
		});
	var pnum = $('.stars').length;
	$('.pj').css("height",pnum*275+180);
	if(pnum>1){
		$('.moresp').show();
	}else{
		$('.moresp').hide();
		
	}
});