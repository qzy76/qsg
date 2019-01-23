//看是否登录
function loginnow () {
	var islogin = $("#islogin").val();
	if(islogin!=null&&islogin>0){
		//已经登录.
	}else{
		//未登录
		// 获取浏览器的宽高
		var w = $(window).width();
		var h = $(document).height();
		var height = $(window).height();
		//获取滚动位置
		var shang= $(document).scrollTop();
		//设置显示位置
		$('.mtlogin').css({left:(w-356)/2,top:(height-428)/2+shang});
		
		// 遮盖板显示
			$('.quan').show();
			// 登录信息
			$('.mtlogin').show();
	}
};
//是否保存登录状态
function isyes() {
	var is = $('.isyes').val();
	if(is ==0){
		$('.isyes').val('7');
	}else{
		$('.isyes').val('0');
	}
}
$(function(){
	$('.aba').click(function () {
		$('#gowhere').val($(this).attr('data-comeBack'));
	});
		// 获取浏览器的宽高
		var w = $(window).width();
		var h = $(document).height();
		var height = $(window).height();
		// 设置宽高
		$('.quan').css({width:w,height:h});
		// 点击X 关闭模态框
		$('.qzy-close').click(function(){
			$('.quan').fadeOut(800);
			$('.mtlogin').fadeOut(800);
		});
		//滚动事件
		$(window).scroll(function (){
			//获取滚动位置
			var shang= $(document).scrollTop();
			//设置显示位置
			$('.mtlogin').css({left:(w-356)/2,top:(height-428)/2+shang});
		});
		// 给显示框加上鼠标按下事件
		$('.mtlogin').mousedown(function(e){
			// 获取当前鼠标的位置
			// 获取显示框距离浏览器左侧和顶部的距离
			var div = $('.mtlogin').offset();
			// e.page 鼠标按下的时候鼠标的位置
			var x = e.pageX - div.left;
			var y = e.pageY - div.top;

			$(document).mousemove(function(evn){
				// evn.page 鼠标移动时候鼠标的实时位置
				var l = evn.pageX - x;
				var t = evn.pageY - y;
				// 判断边界
				// 判断左边界
				if(l<0){
					l = 0;
				}
				// 判断上边界
				if(t<0){
					t = 0;
				}
				// 判断右边界
				if(l > (w - $('.mtlogin').width())){
					l = w - $('.mtlogin').width();
				}
				// 判断下边界
				if(t > (h - $('.mtlogin').height())){
					t = h - $('.mtlogin').height();
				}
				$('.mtlogin').css({left:l,top:t});
				// 松开鼠标的时候，移除鼠标移动事件
				$(document).mouseup(function(){
					$(document).off('mousemove');
				})
			})
		});
		
		$('.dayuyi').click(function () {
			if($(this).next().val()<=1){
				alert("商品数量最少为1！");
				return false;
			}else{
				return true;
			}
		});
});