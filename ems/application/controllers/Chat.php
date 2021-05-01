<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Chat extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Chat_send');
    }

    public function index() {
        $this->load->view('dash/chat/chat');
    }

    public function send_media_msg($orgid) {
        if($this->input->post('media_send')) {
            $user_msg = $this->input->post('image_des');

        $msg_image= $_FILES['media_file']['tmp_name'];
        if (!isset($msg_image))
        {
            echo "Please select an image.";
        }
        else
        {
            $msg_image = file_get_contents($_FILES['media_file']['tmp_name']);
        }
            $userchat = array(
                'u_id' =>  $orgid,
                'u_email' =>  $_SESSION['id'],
                'msg_image' => $msg_image,
                'msg' =>  $user_msg,
            );
            $this->Chat_send->insert_chat( $userchat );
            redirect('dash/chat', 'refresh');
        }
    }





    public function send_msg($orgid){
        if($this->input->post('user_msg_send')) {
            $user_msg = $this->input->post('user_msg');
            $userchat = array(
                'u_id' =>  $orgid,
                'u_email' =>  $_SESSION['id'],
                'msg' =>  $user_msg,
            );
            $this->Chat_send->insert_chat( $userchat );
            redirect('dash/chat', 'refresh');
        }

    }
}
?>
