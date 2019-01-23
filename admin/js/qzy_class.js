$(document).ready(function() {
			$(".ajax1").change(function() {
			var ccosort1 = $(this).val();
		$.get("ajaxTuanAdd.php",{ccosort1:ccosort1},function(data){
			$(".ajax2").html("");
			$(".ajax3").html("");
			$(".ajax2").append("<option value='0' selected='selected'>请选择</option>");
			 $.each(data,function(index,value){
	 		$(".ajax2").append("<option value='"+(index)+"'>"+value+"</option>");
		 });
		},"json");
       });	
         $(".ajax2").change(function() {
			var cccosort2 = $(this).val();
		$.get("ajaxClass1Add.php",{cccosort2:cccosort2},function(data){
			$(".ajax3").html("");
			$(".ajax3").append("<option value='0' selected='selected'>请选择</option>");
			 $.each(data,function(index,value){
	 		$(".ajax3").append("<option value='"+(index)+"'>"+value+"</option>");
		 });
		},"json");
      });
      $(".ajax3").change(function() {
			var val=$(".ajax3").val();
			$("#pid").attr("value",val);
			
      });
});