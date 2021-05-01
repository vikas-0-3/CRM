<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_send extends CI_Model {
    public function insert_chat($userchat)
    {
        $this->db->insert('chat', $userchat);
        redirect('dash/chat', 'refresh');
    }
}

?>