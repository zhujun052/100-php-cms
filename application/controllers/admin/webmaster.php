<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmaster extends MY_Controller {

	public function login()
	{
		$admin = $this->session->userdata('admin');
		if(!empty($admin)){
			header('location:/index.php/admin/webmaster/index');
			exit();
		}else{
			$form_submit = $this->input->post('form_submit');
			if($form_submit == ' '){
				$user_name = $this->input->post('user_name');
				$password = $this->input->post('password');
				
				$this->load->database();
				$query = $this->db->query('SELECT name,password FROM exam_admin where name =\''.$user_name.'\' ');
				$admin = $query->row_array();
	
				if(!empty($admin)&&$admin['password'] == md5($password)){
					
					unset($admin['password']);
					$this->session->set_userdata('admin',$admin);
					
					header('location:/index.php/admin/webmaster/index');
				}else{
                    $message = $this->message('false','用户名或密码错误！');
                    $this->data['message'] = $message;
					$this->load->view('admin/login',$this->data);
				} 
			}else{
                $this->load->view('admin/login');
			}
		}
	}
	
	public function index(){
		$admin = $this->session->userdata('admin');
		if(empty($admin)){
			header('location:/index.php/admin/webmaster/login');
			exit();
		}
		$this->load->view('admin/index');
	}
	
	public function loginout(){
		$this->session->unset_userdata('admin');
		header('location:/index.php/admin/webmaster/login');
		exit();
	}
    
    public function myhomepage(){
        $this->load->view('admin/myhomepage');        
    }
    
    public function menu(){
        $item = $this->input->post('item') ;
        
        $this->load->view('admin/'.$item);
    }

	
}

