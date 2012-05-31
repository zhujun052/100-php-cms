<?php
class MY_Controller extends CI_Controller {

    public $data = array();

	function __construct()
	{
		parent::__construct();
		$this->authentication();
	}

	function authentication(){
		$req_array = $this->uri->segment_array();
        $this->config->load('data/system');
		if(sizeof($req_array)>=2){
			$mod = $req_array[1];
            $c = $req_array[2];
            $m = null;
            if(sizeof($req_array) == 3){
                $m = $req_array[3];
            }
			
			//管理员模块
			if($mod == 'admin'){
				


				if($c!='webmaster'&&$m!='login'){
					$admin = $this->session->userdata('admin');
					if(empty($admin)){
						header('location:/index.php/webmaster/login');
						exit();
					}
				}
			}else if($mod == 'member'){
			     
				//会员模块
                $user = $this->session->userdata('user');
                if($user==null && $m!='login' &&$m!='loginout'){
                	header('location:/index.php');
					exit();
                }
			}else{
				//前台调用模块
				$this->initPage();
			}
		}else{
			//前台调用模块
			$this->initPage();
		}
	}
	
	function initPage(){
		
	}
    
    function message($type,$msg,$message = array()){
        $message['type'] = $type;
        $message['message'] = $msg;
        return $message;
    }

    //公共函数拓展 页面输入
    function post($p){
        return $this->input->post($p);
    }
    
    //公共函数拓展 数据库
    function rowtoarray($sql){
		$query = $this->db->query($sql);
		$row = $query->row_array();
        return $row;
    }
    
    function resulttoarray($sql){
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;

    }
}
