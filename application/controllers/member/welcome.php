<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
    
    function login(){
        $name = $this->post('name');
        $password = $this->post('password');
        
        $this->load->database();
        $userinfo = $this->rowtoarray("select * from exam_user where username = '$name'");
       
        if(!empty($userinfo)&&$userinfo['userpass'] == $password){
            
            unset($userinfo['userpass']);
            $this->session->set_userdata('user',$userinfo);
            
            $message = $this->message('true','登入成功！');
            echo json_encode($message);
        }else{
            $message = $this->message('false','用户名或密码错误！');
            echo json_encode($message);
        }
    }
    
    function index(){
        $this->load->database();
        
        $this->data['navid'] = 'mycourse';
        
        $userinfo = $this->session->userdata('user');
        $uid = $userinfo['id'];
        $this->data['mycourses'] = $this->resulttoarray("select cu.cid,co.cname from exam_courseofuser cu left join exam_course co on cu.cid = co.id where cu.uid = ".$uid);
        
        $this->load->view('member/index',$this->data);
    }
    
    function loginout(){
        $this->session->unset_userdata('user');
		header('location:/index.php');
		exit();
        
    }

}