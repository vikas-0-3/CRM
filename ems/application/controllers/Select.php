<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Select extends CI_Controller{
    public function index(){

        $users_list = $this->db->get_where('users', array( 'u_email' => $_SESSION['id'] ));
            foreach ($users_list->result() as $user)
            {
                $utype = $user->u_type;
            }
            if($utype == 's'){
                $this->load->view('superadmin');
            }
            else {
                $this->load->view('dash/select');
            }
    }
}


?>