<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends MY_Controller {
    function index($pid,$cid){
        $this->load->database();
        
        $this->data['pid'] = $pid;
        
        $this->data['navid'] = 'mycourse';
        $this->data['cid'] = $cid;
        
        $paper = $this->rowtoarray("select * from exam_exampaper where id = ".$pid);
        $this->data['paper'] = $paper;
        
        $questions = $this->resulttoarray('select eq.pid,equ.* from exam_quesofpaper eq left JOIN exam_question equ on eq.qid = equ.id where eq.pid = '.$pid);
        $this->data['questions'] = $questions;
        
        $this->load->view('member/exam',$this->data);
    }
    
    function account(){
        $this->load->database();
        $pid = $this->post('pid');
        
        $questions = $this->resulttoarray('select eq.pid,equ.* from exam_quesofpaper eq left JOIN exam_question equ on eq.qid = equ.id where eq.pid = '.$pid);
        $this->data['questions'] = $questions;
        
        $score = 0;
        $i = 1;
        foreach($questions as $ques){
            $ans = $this->post('ans_'.$i);
            if($ans == $ques['result']){
                $score += $ques['mark'];
            }
            $i++;
        }
        
        $message = $this->message('true',$score);
        echo json_encode($message);
        
    }
    
}