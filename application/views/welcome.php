<?php $this->load->view('header'); ?>
<style>
label, input { display:block; }
input.text { margin-bottom:12px; width:95%; padding: .4em; }
fieldset { padding:0; border:0; margin-top:25px; }
h1 { font-size: 1.2em; margin: .6em 0; }
div#users-contain { width: 350px; margin: 20px 0; }
div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
.ui-dialog .ui-state-error { padding: .3em; }
.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>
<script>
$(function(){
    var tips = $( ".validateTips" );
    $( "#loginform" ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
            draggable:false,
            resizable:false,
            title:'用户登入',
            buttons: {
				"登入": function() {
				    var name = $(this).find("#name").val();
                    var password = $(this).find("#password").val();
                    if(name == ""){
                        updateTips('用户名不能为空！');
                        return;
                    }
                    if(password == ""){
                        updateTips('密码不能为空！');
                        return;
                    }
                    
                    //提交
                    $.post('index.php/member/welcome/login',{name:name,password:password},function(data){
                        if(data.type == 'true'){
                            window.location.href = "index.php/member/welcome/index";
                        }else{
                            updateTips(data.message);
                        }
                    },'json');
                },
                "取消":function(){
                    $( this ).dialog( "close" );
                }
            }
    });
    $("#btn_userlogin").click(function(){
        $( "#loginform" ).dialog("open");
    });
    function updateTips( t ) {
			tips.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
	}
});
</script>
</head>
<body>
<div class="hidden">
    <div id="loginform">
        <p class="validateTips">所有的输入项都是必填项！</p>
    	<form>
    	<fieldset>
    		<label for="name">用户名</label>
    		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
    		<label for="password">密码</label>
    		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
    	</fieldset>
    	</form>
    </div>
</div>
<div class="header">
<div class="header_body">
    <a class="logo"><img src="resource/front/images/logo.png"/></a>
    <div class="userlogin">
        <ul>
            <li>
            <?php
            $user = $this->session->userdata('user');
            if($user!=null){
                ?>
                你好：<?php echo $user['username'];?>&nbsp;&nbsp;<a href="index.php/member/welcome/index">个人主页</a>
                <?php
            }else{
                ?>
                <a  id="btn_userlogin" >登入</a>
                <?php
            }
            ?>
            </li>
        </ul>
    </div>
</div>
</div>
<div id="bodypanel">
<div class="container">
<div class="menu">
<div class="menudiv">
    <div class="mhead">试卷分类</div>
    <span class="title">分类</span>
    <ul class="mbody">
    <li>分类</li>
    <li>分类</li>
    <li>分类</li>
    <li>分类</li>
    <li>分类</li>
    <li>分类</li>
    </ul>
</div>
</div>
<div class="cent">
<div class="list">
   <div class="lhead">最新试卷</div>
   <ul class="lbody">
    <li>最新试卷</li>
    <li>最新试卷</li>
    <li>最新试卷</li>
    <li>最新试卷</li>
    <li>最新试卷</li>
   </ul>
</div>
</div>
<div class="rig">
<div class="list">
   <div class="lhead">最新公告</div>
   <ul class="lbody">
    <li>最新公告</li>
   </ul>
</div>
</div>
</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>