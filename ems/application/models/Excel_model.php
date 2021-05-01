<?php
class Excel_model extends CI_Model 
{
	function getUserDetails($qid){
 		$response = array();
		$this->db->select('*');
		// $q = $this->db->get('quotation');
        $q = $this->db->get_where('quotation', array( 'quotation_id' => $qid ));
		$response = $q->result_array();
	 	return $response;
	}

// 	function getColDetails(){
// 		$response = array();
// 	   	$this->db->select('COLUMNS');
// 	   	$q = $this->db->get('quotation');
// 	   	$response = $q->result_array();
// 		return $response;
//    }
	
}

?>