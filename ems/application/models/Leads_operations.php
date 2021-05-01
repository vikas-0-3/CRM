<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_operations extends CI_Model {

    public function insert_lead($lead_details)
    {
        $this->db->insert('leads', $lead_details);
    }
}

?>