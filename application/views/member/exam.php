<?php $this->load->view('member/header'); ?>
<script type="text/javascript" src="resource/easyui/plugins/jquery.form.js"></script>
<script>
$(function(){
    $("#viewrecord").button();

     $('#exam_from').form({
     url:'index.php/member/exam/account',
     onSubmit: function(){   
  
     },   
     success:function(data){   
         var result;
         try{
            result = eval('('+data+')');
            $("#score").html(result.message);
            if(result.message == 100){
                $( "#result_dialog" ).dialog({
            			autoOpen: false,
            			height: 300,
            			width: 350,
            			modal: true,
                        draggable:false,
                        resizable:false,
                        title:'测评结果',
                        buttons: {
            				"保存": function() {
            				  
                            },
                            "取消":function(){
                                $( this ).dialog( "close" );
                            }
                        }
                });
                $( "#result_dialog" ).dialog("open");
            }else{
                $( "#result_dialog" ).dialog({
            			autoOpen: false,
            			height: 300,
            			width: 350,
            			modal: true,
                        draggable:false,
                        resizable:false,
                        title:'测评结果',
                        buttons: {
            				"继续测试": function() {
            				  
                            },
                            "取消":function(){
                                $( this ).dialog( "close" );
                            }
                        }
                });
                $( "#result_dialog" ).dialog("open");
            }
         }catch(e){
            alert('系统异常，请联系管理员！');
         }  
     }   
     });   


    
});
function viewrecord(){
    $('#exam_from').submit();  
}

</script>
</head>
<body>
<div class="hidden">
    <div id="result_dialog">
    <table class="tb_prop">
        <tr>
            <td class="ltd">得分：</td>
            <td class="rtd"><span id="score"></span></td>
        </tr>
    </table>
    </div>
</div>
<?php $this->load->view('member/top'); ?>
<div id="bodypanel">
<div class="container">
<?php $this->load->view('member/menu'); ?>
<div class="navbar mgt_10">
    <ul>
        <li>当前位置：<a href="index.php/member/welcome/index">我的课程</a>>><a href="index.php/member/exampaper/plist/<?php echo $cid; ?>">试卷列表</a>>><?php echo $paper['ename']; ?></li>
    </ul>
</div>
<div class="list_container">
<form method="post" id="exam_from" name="exam_form" >
<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
<div class="exam_list">
    <ul>
    <?php
    $i = 1;
    foreach($questions as $ques){
        ?>
        <li><?php echo $i; ?>.<?php echo $ques['question']; ?></li>
        <?php
        $asknum = $ques['asknum'];
        for($i=1;$i<=$asknum;$i++){
            ?>
            <li><input type="radio" value="<?php echo 'answer'.$i; ?>" name="ans_<?php echo $ques['id']; ?>" <?php if($i == 1){?>checked="true" <?php } ?>   /><?php echo $ques['answer'.$i]; ?></li>
            <?php
        }
        $i ++ ;
    }
    ?>
    <li><a id="viewrecord" href="javascript:viewrecord()">查看测试结果</a></li>
    </ul>
</div>
</form>
</div>
</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>