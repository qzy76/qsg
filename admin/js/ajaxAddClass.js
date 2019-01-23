$(document).ready(function() {
			$(".ajax1").change(function() {
            //获取文本框中的内容
			var ccosort1 = $(this).val();
		$.get("ajaxTuanAdd.php",{ccosort1:ccosort1},function(data){
			$(".ajax2").html("");
			$(".ajax2").append("<option value='0' selected='selected'>请选择</option>");
			$.each(data,function(index,value){
	 		$(".ajax2").append("<option value='"+(index)+"'>"+value+"</option>");
		 });
		},"json");
       });	
});