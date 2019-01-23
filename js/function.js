function remove(data){//除了@.外，其他符号基本剔除
	var title = data.val();
	title=title.replace(/[&\|\\\*\[\]\{\}=^%!^(/~`?,;"')$#\-]/g,"");
	return title;
}
function removeNum(data){//去除数字
	var title = data.val();
	title=title.replace(/[\d]/g,"");
	return title;
}
function removeHanzi(data){//去除汉字
	var title = data.val();
	title=title.replace(/[\u4e00-\u9fa5]/g,"");
	return title;
}
function removeZimu(data){//去除字母
	var title = data.val();
	title=title.replace(/[^A-Za-z]/g,"");
	return title;
}
function len(data,len) {
	var title = data.val().substring(0,len);
	return title;
}
