<?php $this->load->view('member/header'); ?>
</head>
<body>
<?php $this->load->view('member/top'); ?>
<div id="bodypanel">
<div class="container">
<?php $this->load->view('member/menu'); ?>
<div class="navbar mgt_10">
    <ul>
        <li>当前位置：<a href="index.php/member/welcome/index">我的课程</a>>>试卷列表</li>
    </ul>
</div>
<div class="list_container ">
    <table class="tb_list">
        <thead>
            <tr>
                <td>试卷名称</td>
                <td width="20%">操作</td>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($papers as $paper){
            ?>
            <tr>
                <td><?php echo $paper['ename']; ?></td>
                <td><a href="index.php/member/exam/index/<?php echo $paper['id']; ?>/<?php echo $cid; ?>">考试</a></td>
            </tr>  
            <?php
        }
        ?>  
        </tbody>
    </table>
</div>
</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>