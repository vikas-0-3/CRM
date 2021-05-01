<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class Product extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Product_operations');
    }


    public function index(){
        $this->load->view('dash/product');
    }

    public function update_product_path($prod_id){
        $this->load->view('dash/product/update_product', $prod_id);
    }


    public function create_product_path(){
        $this->load->view('dash/product/create_product');
    }

    public function delete_product($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('product');
        redirect('dash/product', 'refresh');
    }



    public function create_product($a)
    {
        if($this->input->post('create_product'))
        {
            $users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
            foreach ($users_list->result() as $user)
            {
                $idd = $user->u_id;
                $username = $user->u_name;
                $userphone = $user->u_phone;
            }

            $product_owner = $this->input->post('product_owner');
            $product_owner_id = $this->input->post('product_owner_id');
            $product_owner_phone = $this->input->post('product_owner_phone');
            $product_name = $this->input->post('product_name');
            $product_code = $this->input->post('product_code');
            $vendor_name = $this->input->post('vendor_name');
            $vendor_id = $this->input->post('vendor_id');
            $vendor_phone = $this->input->post('vendor_phone');
            $product_status = $this->input->post('product_status');
            $product_manufacturer = $this->input->post('product_manufacturer');
            $product_category = $this->input->post('product_category');
            $product_SalesStartDate = $this->input->post('product_SalesStartDate');
            $product_SalesEndDate = $this->input->post('product_SalesEndDate');
            $product_SupportStartDate = $this->input->post('product_SupportStartDate');
            $product_SupportEndDate = $this->input->post('product_SupportEndDate');
            $product_UnitPrice = $this->input->post('product_UnitPrice');
            $product_CommisionRate = $this->input->post('product_CommisionRate');
            $product_Tax = $this->input->post('product_Tax');
            $product_UsageUnit = $this->input->post('product_UsageUnit');
            $product_QuantityOrdered = $this->input->post('product_QuantityOrdered');
            $product_InStock = $this->input->post('product_InStock');
            $product_Handler = $this->input->post('product_Handler');
            $product_HandlerId = $this->input->post('product_HandlerId');
            $product_HandlerPhone = $this->input->post('product_HandlerPhone');
            $product_Tag = $this->input->post('product_Tag');
            $product_Oem = $this->input->post('product_Oem');
            $product_Hsn = $this->input->post('product_Hsn');
            $product_Image = $_FILES['media_file']['tmp_name'];
            if (!isset($product_Image)) { echo "Please select an image."; }
            else { $product_Image = file_get_contents($_FILES['media_file']['tmp_name']); }
            $product_PackingType = $this->input->post('product_PackingType');
            $product_OpeningStock = $this->input->post('product_OpeningStock');
            $product_OpeningStockValue = $this->input->post('product_OpeningStockValue');
            $product_Discountable = $this->input->post('product_Discountable');
            $product_ApplyDiscount = $this->input->post('product_ApplyDiscount');
            $product_ExpiryDate = $this->input->post('product_ExpiryDate');
            $product_Color = $this->input->post('product_Color');
            $product_Size = $this->input->post('product_Size');
            $product_Measurement = $this->input->post('product_Measurement');
            $product_OrganizationId = $a;
            $product_LeadId = $this->input->post('product_LeadId');
            $product_QuotationId = $this->input->post('product_QuotationId');
            $product_CostPrice = $this->input->post('product_CostPrice');
            $product_Description = $this->input->post('product_Description');
            
            $product_details = array(
                'product_owner' =>  $product_owner,
                'product_owner_id' => $product_owner_id, 
                'product_owner_phone' =>  $product_owner_phone,
                'product_name' =>  $product_name,
                'product_code' =>  $product_code,
                'vendor_name' =>  $vendor_name, 
                'vendor_id' =>  $vendor_id,
                'vendor_phone' =>  $vendor_phone,
                'product_status' =>  $product_status,
                'product_manufacturer' =>  $product_manufacturer, 
                'product_category' =>  $product_category,
                'product_SalesStartDate' =>  $product_SalesStartDate,
                'product_SalesEndDate' =>  $product_SalesEndDate,
                'product_SupportStartDate' =>  $product_SupportStartDate, 
                'product_SupportEndDate' =>  $product_SupportEndDate,
                'product_CreatedBy' =>  $username,
                'product_CreatedById' =>  $_SESSION['id'],
                'product_CreatedByPhone' =>  $userphone, 
                'product_UnitPrice' =>  $product_UnitPrice,
                'product_CommisionRate' =>  $product_CommisionRate,
                'product_Tax' =>  $product_Tax, 
                'product_UsageUnit' =>  $product_UsageUnit,
                'product_QuantityOrdered' =>  $product_QuantityOrdered,
                'product_InStock' =>  $product_InStock,
                'product_Handler' =>  $product_Handler, 
                'product_HandlerId' =>  $product_HandlerId,
                'product_HandlerPhone' =>  $product_HandlerPhone,
                'product_Tag' =>  $product_Tag,
                'product_Oem' =>  $product_Oem, 
                'product_Hsn' =>  $product_Hsn,
                'product_Image' =>  $product_Image,
                'product_PackingType' =>  $product_PackingType,
                'product_OpeningStock' =>  $product_OpeningStock, 
                'product_OpeningStockValue' =>  $product_OpeningStockValue,
                'product_Discountable' =>  $product_Discountable,
                'product_ApplyDiscount' =>  $product_ApplyDiscount, 
                'product_ExpiryDate' =>  $product_ExpiryDate,
                'product_Color' =>  $product_Color,
                'product_Size' =>  $product_Size,
                'product_Measurement' =>  $product_Measurement,
                'product_OrganizationId' =>  $product_OrganizationId,
                'product_LeadId' =>  $product_LeadId, 
                'product_QuotationId' =>  $product_QuotationId,
                'product_CostPrice' =>  $product_CostPrice,
                'product_Description' =>  $product_Description
            );

            $this->Product_operations->insert_product( $product_details );
            redirect('dash/product', 'refresh');
        }



    }

    public function update_product($id)
    {
        if($this->input->post('up_update'))
        {
            $oid = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
            foreach ($oid->result() as $o)
            {
              $idd = $o->u_id;
            }

            $product_owner = $this->input->post('product_owner');
            $product_owner_id = $this->input->post('product_owner_id');
            $product_owner_phone = $this->input->post('product_owner_phone');
            $product_name = $this->input->post('product_name');
            $product_code = $this->input->post('product_code');
            $vendor_name = $this->input->post('vendor_name');
            $vendor_id = $this->input->post('vendor_id');
            $vendor_phone = $this->input->post('vendor_phone');
            $product_status = $this->input->post('product_status');
            $product_manufacturer = $this->input->post('product_manufacturer');
            $product_category = $this->input->post('product_category');
            $product_SalesStartDate = $this->input->post('product_SalesStartDate');
            $product_SalesEndDate = $this->input->post('product_SalesEndDate');
            $product_SupportStartDate = $this->input->post('product_SupportStartDate');
            $product_SupportEndDate = $this->input->post('product_SupportEndDate');
            $product_CreatedBy = $this->input->post('product_CreatedBy');
            $product_CreatedById = $this->input->post('product_CreatedById');
            $product_CreatedByPhone = $this->input->post('product_CreatedByPhone');
            $product_ModifiedBy = $this->input->post('product_ModifiedBy');
            $product_ModifiedById = $this->input->post('product_ModifiedById');
            $product_ModifiedByPhone = $this->input->post('product_ModifiedByPhone');
            // $product_ModificationDateAndTime = $this->input->post('product_ModificationDateAndTime');
            // $product_CreationDateAndTime = $this->input->post('product_CreationDateAndTime');
            $product_UnitPrice = $this->input->post('product_UnitPrice');
            $product_CommisionRate = $this->input->post('product_CommisionRate');
            $product_Tax = $this->input->post('product_Tax');
            $product_UsageUnit = $this->input->post('product_UsageUnit');
            $product_QuantityOrdered = $this->input->post('product_QuantityOrdered');
            $product_InStock = $this->input->post('product_InStock');
            $product_Handler = $this->input->post('product_Handler');
            $product_HandlerId = $this->input->post('product_HandlerId');
            $product_HandlerPhone = $this->input->post('product_HandlerPhone');
            $product_Tag = $this->input->post('product_Tag');
            $product_Oem = $this->input->post('product_Oem');
            $product_Hsn = $this->input->post('product_Hsn');
            // $product_Image = $_FILES['media_file']['tmp_name'];
            // if (!isset($product_Image)) { echo "Please select an image."; }
            // else { $product_Image = file_get_contents($_FILES['media_file']['tmp_name']); }
            $product_PackingType = $this->input->post('product_PackingType');
            $product_OpeningStock = $this->input->post('product_OpeningStock');
            $product_OpeningStockValue = $this->input->post('product_OpeningStockValue');
            $product_Discountable = $this->input->post('product_Discountable');
            $product_ApplyDiscount = $this->input->post('product_ApplyDiscount');
            $product_ExpiryDate = $this->input->post('product_ExpiryDate');
            $product_Color = $this->input->post('product_Color');
            $product_Size = $this->input->post('product_Size');
            $product_Measurement = $this->input->post('product_Measurement');
            // $product_OrganizationId = $this->input->post('product_OrganizationId');
            $product_LeadID = $this->input->post('product_LeadID');
            $product_QuotationId = $this->input->post('product_QuotationId');
            $product_CostPrice = $this->input->post('product_CostPrice');
            $product_Description = $this->input->post('product_Description');
            
            $product_details = array(
                'product_owner' =>  $product_owner,
                'product_owner_id' => $product_owner_id, 
                'product_owner_phone' =>  $product_owner_phone,
                'product_name' =>  $product_name,
                'product_code' =>  $product_code,
                'vendor_name' =>  $vendor_name, 
                'vendor_id' =>  $vendor_id,
                'vendor_phone' =>  $vendor_phone,
                'product_status' =>  $product_status,
                'product_manufacturer' =>  $product_manufacturer, 
                'product_category' =>  $product_category,
                'product_SalesStartDate' =>  $product_SalesStartDate,
                'product_SalesEndDate' =>  $product_SalesEndDate,
                'product_SupportStartDate' =>  $product_SupportStartDate, 
                'product_SupportEndDate' =>  $product_SupportEndDate,
                'product_CreatedBy' =>  $product_CreatedBy,
                'product_CreatedById' =>  $product_CreatedById,
                'product_CreatedByPhone' =>  $product_CreatedByPhone, 
                'product_ModifiedBy' =>  $product_ModifiedBy,
                'product_ModifiedById' =>  $product_ModifiedById,
                'product_ModifiedByPhone' =>  $product_ModifiedByPhone,
                // 'product_ModificationDateAndTime' =>  $product_ModificationDateAndTime, 
                // 'product_CreationDateAndTime' =>  $product_CreationDateAndTime,
                'product_UnitPrice' =>  $product_UnitPrice,
                'product_CommisionRate' =>  $product_CommisionRate,
                'product_Tax' =>  $product_Tax, 
                'product_UsageUnit' =>  $product_UsageUnit,
                'product_QuantityOrdered' =>  $product_QuantityOrdered,
                'product_InStock' =>  $product_InStock,
                'product_Handler' =>  $product_Handler, 
                'product_HandlerId' =>  $product_HandlerId,
                'product_HandlerPhone' =>  $product_HandlerPhone,
                'product_Tag' =>  $product_Tag,
                'product_Oem' =>  $product_Oem, 
                'product_Hsn' =>  $product_Hsn,
                // 'product_Image' =>  $product_Image,
                'product_PackingType' =>  $product_PackingType,
                'product_OpeningStock' =>  $product_OpeningStock, 
                'product_OpeningStockValue' =>  $product_OpeningStockValue,
                'product_Discountable' =>  $product_Discountable,
                'product_ApplyDiscount' =>  $product_ApplyDiscount, 
                'product_ExpiryDate' =>  $product_ExpiryDate,
                'product_Color' =>  $product_Color,
                'product_Size' =>  $product_Size,
                'product_Measurement' =>  $product_Measurement,
                'product_Organizationid' =>  $idd,
                'product_LeadID' =>  $product_LeadID, 
                'product_QuotationId' =>  $product_QuotationId,
                'product_CostPrice' =>  $product_CostPrice,
                'product_Description' =>  $product_Description
            );

            $this->db->where('product_id', $id);
            $this->db->update('product', $product_details);
            redirect('dash/product', 'refresh');
        }

    }



}
?>