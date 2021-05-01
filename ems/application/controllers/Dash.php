<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Dash extends CI_Controller{
    public function index(){
        $this->load->view('dash/dash_home');
    }
    public function def_dash(){
        $this->load->view('dash/def_dash');
    }
    public function product(){
        $this->load->view('dash/product/product');
    }
    public function contact(){
        $this->load->view('dash/contact/contact');
    }
    public function leads(){
        $this->load->view('dash/leads/leads');
    }
    public function chat(){
        $this->load->view('dash/chat/chat');
    }
    public function task(){
        $this->load->view('dash/task/task');
    }
    public function quotation(){
        $this->load->view('dash/quotation/quotation');
    }
    public function cal(){
        $this->load->view('dash/cal');
    }

}


?>
