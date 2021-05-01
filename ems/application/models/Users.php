<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {
    public function insert_user($userdata)
    {
        $res = $this->db->insert('users', $userdata);
        if($res==true)
            {
            echo "<script>alert('Success !')</script>";
            redirect('home', 'refresh');
        }else{
            echo "<script>alert('some error occured !')</script>";
        }
    }
}

?>