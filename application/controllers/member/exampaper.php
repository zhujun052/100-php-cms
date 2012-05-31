<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exampaper extends MY_Controller {
    function plist($cid){
        
        $this->load->database();
        
        $this->data['navid'] = 'mycourse';
        $this->data['cid']=$cid;
        
        $papers = $this->resulttoarray("select * from exam_exampaper where cid = ".$cid." order by createtime desc");
        $this->data['papers'] = $papers;
        
        $this->load->view('member/exampaper',$this->data);
    }
}