<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Contact extends CI_Controller{
    // public function index(){
    //     $this->load->view('dash/contact/create_contact');
    // }

    public function create_contact($uid) {
        if($this->input->post('create_con'))
        {
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $cname = $this->input->post('cname');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $add1 = $this->input->post('add1');
            $add2 = $this->input->post('add2');
            $city = $this->input->post('city');
            $social = $this->input->post('social');
            
            $contact_details = array(
                'org_id' => $uid,
                'first_name' => $fname,
                'last_name' => $lname, 
                'company_name' => $cname,
                'email' => $email,
                'phone' => $phone,
                'address_1' => $add1, 
                'address_2' => $add2,
                'city' => $city,
                'social' =>  $social
            );

            $this->db->insert('contact', $contact_details);
            redirect('dash/contact', 'refresh');
        }
    }

}


?>