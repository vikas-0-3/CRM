<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class Leads extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Leads_operations');
    }


    public function index(){
        $this->load->view('dash/leads');
    }
    public function update_single_lead($lead_id){
        $this->load->view('dash/leads/update_leads', $lead_id);
    }



    public function delete_lead($lead_id)
    {
        $this->db->set('lead_org_status', 'deleted');  
        $this->db->where('lead_id', $lead_id); 
        $this->db->update('leads'); 
        redirect('dash/leads', 'refresh');
    }




    public function create_lead_path(){
        $this->load->view('dash/leads/create_lead');
    }
    public function update_lead($lead_id)
    {
        if($this->input->post('u_update'))
        {
            $lead_owner_name = $this->input->post('lead_owner_name');
            $lead_owner_id = $this->input->post('lead_owner_id');
            $lead_contact_person = $this->input->post('lead_contact_person');
            $lead_contact_person_phone = $this->input->post('lead_contact_person_phone');
            $lead_contact_person_email = $this->input->post('lead_contact_person_email');
            $lead_org_status = $this->input->post('lead_org_status');
            $lead_org_source = $this->input->post('lead_org_source');
            $lead_organization = $this->input->post('lead_organization');
            $lead_org_des = $this->input->post('lead_org_des');
            $lead_org_title = $this->input->post('lead_org_title');
            $lead_org_website = $this->input->post('lead_org_website');
            $lead_org_no_of_emp = $this->input->post('lead_org_no_of_emp');
            $lead_org_annual_revenue = $this->input->post('lead_org_annual_revenue');
            $lead_org_rating = $this->input->post('lead_org_rating');
            $lead_created_by = $this->input->post('lead_created_by');
            $lead_created_by_id = $this->input->post('lead_created_by_id');
            $lead_org_fax = $this->input->post('lead_org_fax');
            $lead_modify_by = $this->input->post('lead_modify_by');
            $lead_modify_by_id = $this->input->post('lead_modify_by_id');
            $lead_modify_time = $this->input->post('lead_modify_time');
            $lead_org_country = $this->input->post('lead_org_country');
            $lead_org_state = $this->input->post('lead_org_state');
            $lead_org_city = $this->input->post('lead_org_city');
            $lead_org_zip_code = $this->input->post('lead_org_zip_code');
            $lead_org_street = $this->input->post('lead_org_street');
            $lead_org_currency = $this->input->post('lead_org_currency');
            $lead_org_exchange_rate = $this->input->post('lead_org_exchange_rate');
            $lead_org_last_activity_time = $this->input->post('lead_org_last_activity_time');
            $lead_org_email = $this->input->post('lead_org_email');
            $lead_org_phone = $this->input->post('lead_org_phone');
            $lead_org_skype = $this->input->post('lead_org_skype');
            $lead_org_twitter = $this->input->post('lead_org_twitter');
            $lead_org_linkedin = $this->input->post('lead_org_linkedin');
            $lead_org_last_view = $this->input->post('lead_org_last_view');
            $lead_org_success_rate = $this->input->post('lead_org_success_rate');
            $lead_org_prediction = $this->input->post('lead_org_prediction');
            $lead_org_is_converted = $this->input->post('lead_org_is_converted');
            $lead_org_converted_person_name = $this->input->post('lead_org_converted_person_name');
            $lead_org_converted_email = $this->input->post('lead_org_converted_email');
            $lead_org_converted_phone = $this->input->post('lead_org_converted_phone');
            $lead_org_converted_account = $this->input->post('lead_org_converted_account');
            $lead_org_converted_deal_id = $this->input->post('lead_org_converted_deal_id');
            $lead_org_last_view = $this->input->post('lead_org_last_view');
            
            $lead_details = array(
                'lead_owner_name' =>  $lead_owner_name, 
                'lead_owner_id' =>  $lead_owner_id,
                'lead_contact_person' =>  $lead_contact_person,
                'lead_contact_person_phone' =>  $lead_contact_person_phone,
                'lead_contact_person_email' =>  $lead_contact_person_email, 
                'lead_org_status' =>  $lead_org_status,
                'lead_org_source' =>  $lead_org_source,
                'lead_organization' =>  $lead_organization,
                'lead_org_des' =>  $lead_org_des, 
                'lead_org_title' =>  $lead_org_title,
                'lead_org_website' =>  $lead_org_website,
                'lead_org_no_of_emp' =>  $lead_org_no_of_emp,
                'lead_org_annual_revenue' =>  $lead_org_annual_revenue, 
                'lead_org_rating' =>  $lead_org_rating,
                'lead_created_by' =>  $lead_created_by,
                'lead_created_by_id' =>  $lead_created_by_id,
                'lead_org_fax' =>  $lead_org_fax, 
                'lead_modify_by' =>  $lead_modify_by,
                'lead_modify_by_id' =>  $lead_modify_by_id,
                'lead_modify_time' =>  $lead_modify_time,
                'lead_org_country' =>  $lead_org_country, 
                'lead_org_state' =>  $lead_org_state,
                'lead_org_city' =>  $lead_org_city,
                'lead_org_zip_code' =>  $lead_org_zip_code,
                'lead_org_street' =>  $lead_org_street, 
                'lead_org_currency' =>  $lead_org_currency,
                'lead_org_exchange_rate' =>  $lead_org_exchange_rate,
                'lead_org_last_activity_time' =>  $lead_org_last_activity_time,
                'lead_org_email' =>  $lead_org_email, 
                'lead_org_phone' =>  $lead_org_phone,
                'lead_org_skype' =>  $lead_org_skype,
                'lead_org_twitter' =>  $lead_org_twitter,
                'lead_org_linkedin' =>  $lead_org_linkedin, 
                'lead_org_last_view' =>  $lead_org_last_view,
                'lead_org_success_rate' =>  $lead_org_success_rate,
                'lead_org_prediction' =>  $lead_org_prediction,
                'lead_org_is_converted' =>  $lead_org_is_converted, 
                'lead_org_converted_person_name' =>  $lead_org_converted_person_name,
                'lead_org_converted_email' =>  $lead_org_converted_email,
                'lead_org_converted_phone' =>  $lead_org_converted_phone, 
                'lead_org_converted_account' =>  $lead_org_converted_account,
                'lead_org_converted_deal_id' =>  $lead_org_converted_deal_id,
                'lead_org_last_view' =>  $lead_org_last_view
            );
            $this->db->where('lead_id', $lead_id);
            $this->db->update('leads', $lead_details);
            redirect('dash/leads', 'refresh');
        }

    }

    //create lead
    public function create_lead($a)
    {
        if($this->input->post('create_lead'))
        {
            $lead_org_id = $a;
            $lead_owner_name = $this->input->post('lead_owner_name');
            $lead_owner_id = $this->input->post('lead_owner_id');
            $lead_contact_person = $this->input->post('lead_contact_person');
            $lead_contact_person_phone = $this->input->post('lead_contact_person_phone');
            $lead_contact_person_email = $this->input->post('lead_contact_person_email');
            $lead_org_status = $this->input->post('lead_org_status');
            $lead_org_source = $this->input->post('lead_org_source');
            $lead_organization = $this->input->post('lead_organization');
            $lead_org_des = $this->input->post('lead_org_des');
            $lead_org_title = $this->input->post('lead_org_title');
            $lead_org_website = $this->input->post('lead_org_website');
            $lead_org_no_of_emp = $this->input->post('lead_org_no_of_emp');
            $lead_org_annual_revenue = $this->input->post('lead_org_annual_revenue');
            $lead_org_rating = $this->input->post('lead_org_rating');
            $lead_created_by = $this->input->post('lead_created_by');
            $lead_created_by_id = $this->input->post('lead_created_by_id');
            $lead_org_fax = $this->input->post('lead_org_fax');
            $lead_modify_by = $this->input->post('lead_modify_by');
            $lead_modify_by_id = $this->input->post('lead_modify_by_id');
            $lead_modify_time = $this->input->post('lead_modify_time');
            $lead_org_country = $this->input->post('lead_org_country');
            $lead_org_state = $this->input->post('lead_org_state');
            $lead_org_city = $this->input->post('lead_org_city');
            $lead_org_zip_code = $this->input->post('lead_org_zip_code');
            $lead_org_street = $this->input->post('lead_org_street');
            $lead_org_currency = $this->input->post('lead_org_currency');
            $lead_org_exchange_rate = $this->input->post('lead_org_exchange_rate');
            $lead_org_last_activity_time = $this->input->post('lead_org_last_activity_time');
            $lead_org_email = $this->input->post('lead_org_email');
            $lead_org_phone = $this->input->post('lead_org_phone');
            $lead_org_skype = $this->input->post('lead_org_skype');
            $lead_org_twitter = $this->input->post('lead_org_twitter');
            $lead_org_linkedin = $this->input->post('lead_org_linkedin');
            $lead_org_last_view = $this->input->post('lead_org_last_view');
            $lead_org_success_rate = $this->input->post('lead_org_success_rate');
            $lead_org_prediction = $this->input->post('lead_org_prediction');
            $lead_org_is_converted = $this->input->post('lead_org_is_converted');
            $lead_org_converted_person_name = $this->input->post('lead_org_converted_person_name');
            $lead_org_converted_email = $this->input->post('lead_org_converted_email');
            $lead_org_converted_phone = $this->input->post('lead_org_converted_phone');
            $lead_org_converted_account = $this->input->post('lead_org_converted_account');
            $lead_org_converted_deal_id = $this->input->post('lead_org_converted_deal_id');
            $lead_org_last_view = $this->input->post('lead_org_last_view');
            
            $lead_details = array(
                'lead_owner_name' =>  $lead_owner_name,
                'lead_org_id' => $lead_org_id, 
                'lead_owner_id' =>  $lead_owner_id,
                'lead_contact_person' =>  $lead_contact_person,
                'lead_contact_person_phone' =>  $lead_contact_person_phone,
                'lead_contact_person_email' =>  $lead_contact_person_email, 
                'lead_org_status' =>  $lead_org_status,
                'lead_org_source' =>  $lead_org_source,
                'lead_organization' =>  $lead_organization,
                'lead_org_des' =>  $lead_org_des, 
                'lead_org_title' =>  $lead_org_title,
                'lead_org_website' =>  $lead_org_website,
                'lead_org_no_of_emp' =>  $lead_org_no_of_emp,
                'lead_org_annual_revenue' =>  $lead_org_annual_revenue, 
                'lead_org_rating' =>  $lead_org_rating,
                'lead_created_by' =>  $lead_created_by,
                'lead_created_by_id' =>  $lead_created_by_id,
                'lead_org_fax' =>  $lead_org_fax, 
                'lead_modify_by' =>  $lead_modify_by,
                'lead_modify_by_id' =>  $lead_modify_by_id,
                'lead_modify_time' =>  $lead_modify_time,
                'lead_org_country' =>  $lead_org_country, 
                'lead_org_state' =>  $lead_org_state,
                'lead_org_city' =>  $lead_org_city,
                'lead_org_zip_code' =>  $lead_org_zip_code,
                'lead_org_street' =>  $lead_org_street, 
                'lead_org_currency' =>  $lead_org_currency,
                'lead_org_exchange_rate' =>  $lead_org_exchange_rate,
                'lead_org_last_activity_time' =>  $lead_org_last_activity_time,
                'lead_org_email' =>  $lead_org_email, 
                'lead_org_phone' =>  $lead_org_phone,
                'lead_org_skype' =>  $lead_org_skype,
                'lead_org_twitter' =>  $lead_org_twitter,
                'lead_org_linkedin' =>  $lead_org_linkedin, 
                'lead_org_last_view' =>  $lead_org_last_view,
                'lead_org_success_rate' =>  $lead_org_success_rate,
                'lead_org_prediction' =>  $lead_org_prediction,
                'lead_org_is_converted' =>  $lead_org_is_converted, 
                'lead_org_converted_person_name' =>  $lead_org_converted_person_name,
                'lead_org_converted_email' =>  $lead_org_converted_email,
                'lead_org_converted_phone' =>  $lead_org_converted_phone, 
                'lead_org_converted_account' =>  $lead_org_converted_account,
                'lead_org_converted_deal_id' =>  $lead_org_converted_deal_id,
                'lead_org_last_view' =>  $lead_org_last_view
            );
            $this->Leads_operations->insert_lead( $lead_details );
            redirect('dash/leads', 'refresh');
        }
        else {
            redirect('dash/leads/create_lead_path', 'refresh');
        }


    }


}
?>
