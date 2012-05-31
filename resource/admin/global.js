$(function(){
	/*
	 $("body").ajaxStart(function(){
		 mask();
	 });
	
	 $("body").ajaxStop(function(){
		 unmask();
	 });*/
});
function menuList(menuid) {
	$("#nav_" + menuid).parent().parent("ul").find("li")
			.removeClass("selected");

	var panels = $('#accordion').accordion('panels');
	if (panels.length >= 1) {
		for ( var i = 0; i < panels.length; i++) {
			var title = panels[i].panel('options').title
			$('#accordion').accordion('remove', title);
		}
	}

	$("#nav_" + menuid).parent("li").addClass("selected");
	var title;
	var url;
	if (menuid == 'system') {
		title = "系统";
	} else if (menuid == 'user') {
		title = "用户管理";
	} else if (menuid == 'exam') {
		title = "考试管理";
	} else if (menuid == 'type') {
		title = "用户组织";
	} else if (menuid == 'article') {
		title = "试卷管理";
	}

	url = "index.php/admin/webmaster/menu";

	$.post(url, {
		item : menuid
	}, function(data) {
		$('#accordion').accordion('add', {
			title : title,
			content : data
		});
	}, 'html');

}
function tab(title, url) {
	var closable = true;
	var exists = $('#tabs').tabs('exists', title);
    if(title == "我的主页"){
        closable = false;
    }
    
	if (!exists) {
		$('#tabs')
				.tabs(
						'add',
						{
							title : title,
							closable : closable,
							content : '<iframe src="'
									+ url
									+ '" frameborder="0"  width="100%" height="100%" ></iframe>'
						});
	} else {
		$('#tabs').tabs('select', title);
	}
}
function g_select(domid, json, param, defopt) {
	var str = "";
	str += defopt;
	for ( var i = 0; i < json.length; i++) {
		str += "<option value=\"" + json[i][param.key] + "\">"
				+ json[i][param.value] + "</option>";
	}
	$("#" + domid).html(str);
}
function error(message) {
	$.messager.alert('错误提示', message, 'error');
}
function success(message) {
	$.messager.alert('提示', message, 'info');
}
function rdnum() {
	return Math.floor(Math.random() * 100000);
}
function mask(msg){
	if(msg){
		$("body").mask(msg);
	}else{
		$("body").mask('页面正在加载……');
	}
}
function unmask(){
	$("body").unmask();
}