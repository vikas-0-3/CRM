<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users');
    }

	public function index(){
        $this->load->view('dash/header');
        $this->load->view('home');
        $this->load->view('dash/footer');
    }
    
    public function login(){
        $this->load->view('login');
        $this->load->view('dash/footer');
    }

    public function register(){
        $this->load->view('register');
        $this->load->view('dash/footer');
    }

    public function registration_user(){
        if($this->input->post('u_reg')){
            $u_name = $this->input->post('u_name');
            $u_email = $this->input->post('u_email');
            $u_pass = md5($this->input->post('u_pass'));

            $user_data = array(
                'u_name' => $u_name,
                'u_email' => $u_email,
                'u_pass' => $u_pass,
            );
            $this->Users->insert_user( $user_data );
            redirect('home', 'refresh');
        }
        else {
            redirect('home', 'refresh');
        }
    }

    public function login_user(){
        if($this->input->post('u_login')){
            $u_email = $this->input->post('u_email');
            $u_pass = md5($this->input->post('u_pass'));

            $user_data = array(
                'u_email' => $u_email,
                'u_pass' => $u_pass,
            );
            
            $users_list = $this->db->get_where('users', array( 'u_email' => $user_data['u_email'] ));
            foreach ($users_list->result() as $user)
            {
                if($user_data['u_email'] == $user->u_email && $user_data['u_pass'] == $user->u_pass )
                {
                    $_SESSION['id'] = $user_data['u_email'];
                    $this->db->where('u_email', $_SESSION['id']);
                    $this->db->update('users', array( 'online' => 'yes' ));
                    redirect('select','refresh');
                }
                else {
                    echo "<script>alert('Username or password incorreect !')</script>";
                    redirect('home', 'refresh');
                }
            }
        }
        else {
            redirect('home', 'refresh');
        }
    }
    public function logout()
    {
        $this->db->where('u_email', $_SESSION['id']);
        $this->db->update('users', array( 'online' => 'no' ));
        session_unset();
        session_destroy();
        redirect('home', 'refresh');
    }
}
