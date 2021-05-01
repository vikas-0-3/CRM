<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Eleave extends CI_Controller{

    public function index(){
        $this->load->view('eleave/dash_eleave');
    }

    public function def_dash() {
        $this->load->view('eleave/def_dash');
    }

    public function manage_leave() {
        $this->load->view('eleave/manage_leave');
    }
    public function apply_leave() {
        $this->load->view('eleave/apply_leave');
    }
    public function my_history() {
        $this->load->view('eleave/my_history');
    }

    public function apply_emp_leave($a) {
        if($this->input->post('create_leave'))
        {
            $leave_emp_email = $this->input->post('leave_emp_email');
            $leave_emp_purpose = $this->input->post('leave_emp_purpose');
            $leave_from_date = $this->input->post('leave_from_date');
            $leave_to_date = $this->input->post('leave_to_date');
            $leave_des = $this->input->post('leave_des');
            
            $leave_details = array(
                'leave_org_id' => $a, 
                'leave_emp_email' =>  $leave_emp_email,
                'leave_created_by_id' =>  $_SESSION['id'],
                'leave_purpose' =>  $leave_emp_purpose,
                'leave_from_date' =>  $leave_from_date, 
                'leave_to_date' =>  $leave_to_date,
                'leave_status' => 'pending',
                'leave_type' => 'free',
                'leave_description' => $leave_des

            );
            $this->db->insert('emp_leave', $leave_details);
            redirect('eleave/my_history', 'refresh');
        }
    }

    public function accept_leave($id) {
        $this->db->set('leave_status', 'accepted');  
        $this->db->where('leave_id', $id); 
        $this->db->update('emp_leave'); 
        redirect('eleave/manage_leave', 'refresh');
    }

    public function reject_leave($id) {
        $this->db->set('leave_status', 'rejected');  
        $this->db->where('leave_id', $id); 
        $this->db->update('emp_leave'); 
        redirect('eleave/manage_leave', 'refresh');
    }


}


?>
