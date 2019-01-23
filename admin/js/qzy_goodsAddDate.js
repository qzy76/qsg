$(function() {
	$("#but").click(function() {
		if($(".ptuan:checked").is(":checked")) {
			var b = $("#date").val();
			if(b == "") {
				var r = confirm("团购商品必须填写日期!");
				if(r == true) {
				} else {
					alert("You pressed Cancel!");
					$('.form-x').attr("action","");
				}
			}
		}

	});
});