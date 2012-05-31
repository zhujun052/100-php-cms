<?php $this->load->view('member/header'); ?>
</head>
<body>
<?php $this->load->view('member/top'); ?>
<div id="bodypanel">
<div class="container">
<?php $this->load->view('member/menu'); ?>
<div class="navbar mgt_10">
    <ul>
        <li>当前位置：我的课程</li>
    </ul>
</div>
<div class="list_container">
    <table class="tb_list">
        <thead>
            <tr>
                <td>课程名称</td>
                <td width="20%">操作</td>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($mycourses as $course){
            ?>
            <tr>
                <td><?php echo $course['cname']; ?></td>
                <td><a href="index.php/member/exampaper/plist/<?php echo $course['cid']; ?>">试卷列表</a></td>
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