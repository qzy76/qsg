	var $lieq = $("#goodspos ul li:eq(2) .thisification");
	var brandlist="";
	var uselist="";
	var goodid=0;
	function add_select(e){
		var adda="<a href='#1' onClick='delect_a(this)'>"+$(e).text()+"</a>";   //添加到已选标签js
		brandlist += "'"+$(e).text()+"',";
		$lieq.append(adda);
		$(e).remove("a");
	}
	function delect_a(d){
		var addd = "<a href='#3' onClick='add_select(this)'>"+$(d).text()+"</a>";//添加到原来的标签js
		brandlist = brandlist.replace("'"+$(d).text()+"',",""); //替换
		//brandlist = StringFirst.split("'"+$(d).text()+"',");
		//brandlist = brandlist.join(''); //链接空字符
		$("#goodspos ul li:eq(0) .thisification").append(addd);
		$(d).remove("a");
	}
	function add_use(u){
		var addu="<a href='#2' onClick='delect_b(this)'>"+$(u).text()+"</a>";   //添加到已选标签js
		uselist += "'"+$(u).text()+"',";
		$lieq.append(addu);
		$(u).remove("a");
		}
	function delect_b(d){
		var addd = "<a href='#3' onClick='add_use(this)'>"+$(d).text()+"</a>";//添加到原来的标签js
		uselist = uselist.replace("'"+$(d).text()+"',",""); //替换
		//uselist = StringFirst.split("'"+$(d).text()+"',");// 删除
		
		$("#goodspos ul li:eq(1) .thisification").append(addd);
		$(d).remove("a");
	}
	$(function(){
		var $changeul = $("#visitgoods ul");
	$lieq.bind("DOMNodeInserted",function(e){
		
		$.post("newgood.php",{shoptwo:brandlist,shopthree:uselist},function(data){
			$("#visitgoods ul li").remove();
			  $.each(data,function(index,val){   
			  $changeul.append(
			  "<li><a href='detail.php?sid="+val.sid+"'><img src='uploads/"+val.sphoto+"'></a><div class='smallgood'><p>"+val.sname+"</p><h4>&nbsp;"+val.sprice+"</h4><h5>"+val.sbrand+"</h5></div></li>");  
   			});		
			},"json");
		});
		$lieq.bind("DOMNodeRemoved",function(e){
			if(uselist=""){
		location.href = "goodslist.php";
			}
			else{
		$.post("newgood.php",{shoptwo:brandlist,shopthree:uselist},function(data){
			$("#visitgoods ul li").remove();
			  $.each(data,function(index,val){   
			  $changeul.append(
			  "<li><a href='detail.php?sid="+val.sid+"'><img src='uploads/"+val.sphoto+"'></a><div class='smallgood'><p>"+val.sname+"</p><h4>&nbsp;"+val.sprice+"</h4><h5>"+val.sbrand+"</h5></div></li>");  
   			});		
			},"json");
				}
		});
	
	});
	