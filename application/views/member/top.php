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
                &nbsp;&nbsp;<a href="index.php/member/welcome/loginout">退出</a>
                <?php
            }
            ?>
            </li>
        </ul>
    </div>
</div>
</div>