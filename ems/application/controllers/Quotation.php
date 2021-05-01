<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Quotation extends CI_Controller{
    public function index(){
        $this->load->view('dash/quotation/create_quotation');
    }

    public function create_quotation($uid) {
        if($this->input->post('create_quotation'))
        {
            $s1 = "";
            $s2 = "";
            $s3= "";
            $s4 = "";
            $s5 = "";
            $s6 = "";
            $s7 = "";
            $s8 = "";
            $s9 = "";
            // input from customer information
            $quotation_org = $this->input->post('quotation_org');
            $quotation_contact = $this->input->post('quotation_contact');
            $quotation_date = $this->input->post('quotation_date');

            //  input from product information
            $quotation_productcode = $this->input->post('quotation_product');
            foreach( $quotation_productcode as $ss1 ) { $s1.=$ss1." , "; }
            $quotation_quantity = $this->input->post('quotation_quantity');
            foreach( $quotation_quantity as $ss3 ) { $s3.=$ss3." , "; }
            $quotation_uom = $this->input->post('quotation_uom');
            foreach( $quotation_uom as $ss4 ) { $s4.=$ss4." , "; }
            $quotation_unit_price = $this->input->post('quotation_unit_price');
            foreach( $quotation_unit_price as $ss5 ) { $s5.=$ss5." , "; }
            $quotation_total = $this->input->post('quotation_total');
            foreach( $quotation_total as $ss6 ) { $s6.=$ss6." , "; }
            $quotation_gst = $this->input->post('quotation_gst');
            foreach( $quotation_gst as $ss7 ) { $s7.=$ss7." , "; }
            $quotation_gstamt = $this->input->post('quotation_gstamt');
            foreach( $quotation_gstamt as $ss8 ) { $s8.=$ss8." , "; }
            $quotation_gttl = $this->input->post('quotation_gttl');
            foreach( $quotation_gttl as $ss9 ) { $s9.=$ss9." , "; }

            //  terms and condition
            $check_1 = $this->input->post('check_1');
            $check_2 = $this->input->post('check_2');
            $check_3 = $this->input->post('check_3');
            $check_4 = $this->input->post('check_4');
            $check_5 = $this->input->post('check_5');
            $check_6 = $this->input->post('check_6');
            $check_7 = $this->input->post('check_7');

            // discount information
            $quotation_discount = $this->input->post('quotation_discount');

            $users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
            foreach ($users_list->result() as $user)
            {
                $username = $user->u_name;
                $userphone = $user->u_phone;
            }
            
            $quotation_details = array(
                'quotation_org' => $quotation_org,
                'quotation_date_time' => $quotation_date,
                'quotation_contact_person' => $quotation_contact, 

                'quotation_product' => $s1,
                'quotation_quantity' => $s3,
                'quotation_uom' => $s4, 
                'quotation_unit_price' => $s5,
                'quotation_gst' => $s7,
                'quotation_total' => $s6,
                'quotation_gst_amount' => $s8,
                'quotation_grand_total' => $s9,

                'quotation_discount' => $quotation_discount,
                'quotation_check1' => $check_1,
                'quotation_check2' => $check_2,
                'quotation_check3' => $check_3,
                'quotation_check4' => $check_4,
                'quotation_check5' => $check_5,
                'quotation_check6' => $check_6,
                'quotation_check7' => $check_7,
                
                
                
                'quotation_org_id' =>  $uid,
                'quotation_created_by' =>  $username,
                'quotation_created_by_id' =>  $_SESSION['id'],
                'quotation_created_by_phone' =>  $userphone
            );

            $this->db->insert('quotation', $quotation_details);
            redirect('dash/quotation', 'refresh');
        }
    }

}

?>