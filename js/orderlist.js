function delorder(data){
	var r=confirm("确定取消吗？");
	if (r==true){
		$.ajax({
			url:"deleteOrder.php",
			type:"POST",
			data:{"data":data},
			success:function (k){
				if(k){
					location.href="orderlist.php";
				}else{
					alert("取消失败，请刷新重试");
				}
			}
		});
	}	
}