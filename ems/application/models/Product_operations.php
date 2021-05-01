<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_operations extends CI_Model {

    public function insert_product($product_details)
    {
        $this->db->insert('product', $product_details);
    }
}

?>