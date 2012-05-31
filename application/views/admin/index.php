<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<base href="<?php echo $this->config->item('system_basehref');?>" />
<title><?php echo $this->config->item('system_title');?></title>
    <?php $this->load->view('admin/header'); ?>
    <script type="text/javascript" src="resource/admin/js/index.js"></script>
</head>
<body class="easyui-layout">
		<div region="north" style="height:85px;overflow:hidden;" class="headerNav">
			<a class="logo"></a>
            <ul class="nav">
                <li><a>修改密码</a></li>
                <li><a href="index.php/admin/webmaster/loginout">退出</a></li>
            </ul>
            <div id="navMenu">
				<ul>
					<li class="selected"><a id="nav_control" href="javascript:menuList('system')"><span>系统管理</span></a></li>
					<li><a id="nav_config" href="javascript:menuList('user')"><span>用户管理</span></a></li>
					<li><a id="nav_goods" href="javascript:menuList('exam')"><span>考试管理</span></a></li>
					<li><a id="nav_shop" href="javascript:menuList('type')"><span>用户组织</span></a></li>
					<li><a id="nav_member" href="javascript:menuList('article')"><span>试卷管理</span></a></li>
				</ul>
			</div>
		</div>
		<div region="south" style="height:30px;background:#efefef;text-align: center;padding-top:5px;">
		<?php echo $this->config->item('system_name'); ?>
		</div>
		<div region="west" split="true" style="width:150px;overflow:hidden;">
			<div id="accordion" fit="true" border="false">
			</div>
		</div>
		<div region="center" style="overflow:hidden;">
			<div id="tabs" fit="true" border="false" >
			</div>
		</div>
</body>
</html>