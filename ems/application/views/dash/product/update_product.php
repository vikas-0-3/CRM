<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !$_SESSION['id'] ) {
    redirect('home','refresh');
}
$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user)
  {
    $a = $user->u_id;
  }
  $color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $color1 = $col->color_1;
    $color2 = $col->color_2;
  }

?>


<?php $this->load->view('dash/header'); ?>
<style>

    #topbar {
        background-color: <?php echo $color2; ?>;
    }
    .lead_info {
      background-color: <?php echo $color1; ?>;
      color: white;
    }
    .form-label {
      padding: 0;
      margin: 0;
      font-size: 12px;
      font-weight: bold;
    }

</style>

</head>
</body>

<h3 class="text-center"><b>UPDATE PRODUCT</b></h3>

<?php  
$product_list = $this->db->get_where('product', array( 'product_id' => $this->uri->segment(3) ));
    foreach($product_list->result() as $prod)
    {
    ?>


<div class="container-fluid p-4">
<?php echo form_open_multipart('product/update_product/'.$this->uri->segment(3)); ?>
<p class="lead_info">&emsp;<i class="fas fa-user"></i>&emsp;Product details</p>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Name</label>
        <input type="text" name="product_name" class="form-control form-control-sm" value="<?php echo $prod->product_name; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Code</label>
        <input type="text" name="product_code" class="form-control form-control-sm" value="<?php echo $prod->product_code; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Owner</label>
        <input type="text" name="product_owner" class="form-control form-control-sm" value="<?php echo $prod->product_owner; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Product Owner Email</label>
        <input type="text" name="product_owner_id" class="form-control form-control-sm" value="<?php echo $prod->product_owner_id; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Product Owner Phone</label>
        <input type="text" name="product_owner_phone" class="form-control form-control-sm" value="<?php echo $prod->product_owner_phone; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Catogory</label>
        <input type="text" name="product_category" class="form-control form-control-sm" value="<?php echo $prod->product_category; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Status</label>
        <input type="text" name="product_status" class="form-control form-control-sm" value="<?php echo $prod->product_status; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Vendor Name</label>
        <input type="text" name="vendor_name" class="form-control form-control-sm" value="<?php echo $prod->vendor_name; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Vendor Email</label>
        <input type="text" name="vendor_id" class="form-control form-control-sm" value="<?php echo $prod->vendor_id; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Vendor Phone</label>
        <input type="text" name="vendor_phone" class="form-control form-control-sm" value="<?php echo $prod->vendor_phone; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Tag</label>
        <input type="text" name="product_Tag" class="form-control form-control-sm" value="<?php echo $prod->product_Tag; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Oem</label>
        <input type="text" name="product_Oem" class="form-control form-control-sm" value="<?php echo $prod->product_Oem; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Hsn</label>
        <input type="text" name="product_Hsn" class="form-control form-control-sm" value="<?php echo $prod->product_Hsn; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Lead ID</label>
        <input type="text" name="product_LeadID" class="form-control form-control-sm" value="<?php echo $prod->product_LeadID; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product ID</label>
        <input type="text" name="product_id" class="form-control form-control-sm" value="<?php echo $prod->product_id; ?>" disabled />
    </div>
  </div>


  <p class="lead_info">&emsp;<i class="fas fa-users"></i>&emsp;More detail</p>
  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Manufacturer</label>
        <input type="text" name="product_manufacturer" class="form-control form-control-sm" value="<?php echo $prod->product_manufacturer; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Unit Price</label>
        <input type="text" name="product_UnitPrice" class="form-control form-control-sm" value="<?php echo $prod->product_UnitPrice; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Cost Price</label>
        <input type="text" name="product_CostPrice" class="form-control form-control-sm" value="<?php echo $prod->product_CostPrice; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product In Stock</label>
        <input type="text" name="product_InStock" class="form-control form-control-sm" value="<?php echo $prod->product_InStock; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Tax</label>
        <input type="text" name="product_Tax" class="form-control form-control-sm" value="<?php echo $prod->product_Tax; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Created By</label>
        <input type="text" name="product_CreatedBy" class="form-control form-control-sm" value="<?php echo $prod->product_CreatedBy; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Created By Phone</label>
        <input type="text" name="product_CreatedByPhone" class="form-control form-control-sm" value="<?php echo $prod->product_CreatedByPhone; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Created By Email</label>
        <input type="text" name="product_CreatedById" class="form-control form-control-sm" value="<?php echo $prod->product_CreatedById; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Creation Date and Time</label>
        <input type="text" name="product_CreationDateAndTime" class="form-control form-control-sm" value="<?php echo $prod->product_CreationDateAndTime; ?>" disabled />
    </div>
    <div class="col">
        <label class="form-label">Product Packng Type</label>
        <input type="text" name="product_PackingType" class="form-control form-control-sm" value="<?php echo $prod->product_PackingType; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Modified By</label>
        <input type="text" name="product_ModifiedBy" class="form-control form-control-sm" value="<?php echo $prod->product_ModifiedBy; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Modified By Phone</label>
        <input type="text" name="product_ModifiedByPhone" class="form-control form-control-sm" value="<?php echo $prod->product_ModifiedByPhone; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Modified By Email</label>
        <input type="text" name="product_ModifiedById" class="form-control form-control-sm" value="<?php echo $prod->product_ModifiedById; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Modification Date and Time</label>
        <input type="text" name="product_ModificationDateAndTime" class="form-control form-control-sm" value="<?php echo $prod->product_ModificationDateAndTime; ?>"\ />
    </div>
    <div class="col">
        <label class="form-label">Product Commision Rate</label>
        <input type="text" name="product_CommisionRate" class="form-control form-control-sm" value="<?php echo $prod->product_CommisionRate; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Image</label>
        <input type="file" name="media_file" class="form-control form-control-sm" /> 
        <!-- value="<?php echo $prod->media_file; ?>" -->
    </div>
    <div class="col">
        <label class="form-label">Product Quantity ordered</label>
        <input type="text" name="product_QuantityOrdered" class="form-control form-control-sm" value="<?php echo $prod->product_QuantityOrdered; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Handler</label>
        <input type="text" name="product_Handler" class="form-control form-control-sm" value="<?php echo $prod->product_Handler; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Handler Email</label>
        <input type="text" name="product_HandlerId" class="form-control form-control-sm" value="<?php echo $prod->product_HandlerId; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Handler Phone</label>
        <input type="text" name="product_HandlerPhone" class="form-control form-control-sm" value="<?php echo $prod->product_HandlerPhone; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Opening Stock</label>
        <input type="text" name="product_OpeningStock" class="form-control form-control-sm" value="<?php echo $prod->product_OpeningStock; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Opening Stock Value</label>
        <input type="text" name="product_OpeningStockValue" class="form-control form-control-sm" value="<?php echo $prod->product_OpeningStockValue; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Discountable</label>
        <input type="text" name="product_Discountable" class="form-control form-control-sm" value="<?php echo $prod->product_Discountable; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Apply Discount</label>
    <input type="text" name="product_ApplyDiscount" class="form-control form-control-sm" value="<?php echo $prod->product_ApplyDiscount; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Expiry Date</label>
    <input type="text" name="product_ExpiryDate" class="form-control form-control-sm" value="<?php echo $prod->product_ExpiryDate; ?>" />
    </div>
  </div>



  <p class="lead_info">&emsp;<i class="far fa-question-circle"></i>&emsp;Product Measurement</p>
  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Color</label>
        <input type="text" name="product_Color" class="form-control form-control-sm" value="<?php echo $prod->product_Color; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Size</label>
        <input type="text" name="product_Size" class="form-control form-control-sm" value="<?php echo $prod->product_Size; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Measurement</label>
        <input type="text" name="product_Measurement" class="form-control form-control-sm" value="<?php echo $prod->product_Measurement; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Usage Unit</label>
        <input type="text" name="product_UsageUnit" class="form-control form-control-sm" value="<?php echo $prod->product_UsageUnit; ?>" />
    </div>
    <div class="col">

    </div>
  </div>

  <p class="lead_info">&emsp;<i class="fas fa-exchange-alt"></i>&emsp;Sale details</p>
  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Product Sales Start Date</label>
        <input type="text" name="product_SalesStartDate" class="form-control form-control-sm" value="<?php echo $prod->product_SalesStartDate; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Sales End Date</label>
        <input type="text" name="product_SalesEndDate" class="form-control form-control-sm" value="<?php echo $prod->product_SalesEndDate; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Support Start Date</label>
        <input type="text" name="product_SupportStartDate" class="form-control form-control-sm" value="<?php echo $prod->product_SupportStartDate; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Support End Date</label>
        <input type="text" name="product_SupportEndDate" class="form-control form-control-sm" value="<?php echo $prod->product_SupportEndDate; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Product Quotation Id</label>
        <input type="text" name="product_QuotationID" class="form-control form-control-sm" value="<?php echo $prod->product_QuotationID; ?>" />
    </div>
  </div>


  <div class="form-outline">
  <label class="form-label">Product Description</label>
    <textarea class="form-control" name="product_Description" id="form6Example7" rows="3" value="<?php echo $prod->product_Description; ?>"><?php echo $prod->product_Description; ?></textarea>
  </div>

<div class="container-fluid my-2">
    <input type="submit" name="up_update" class="btn btn-sm btn-success" value="Update">
    <a href="<?php echo site_url(); ?>product/delete_product/<?php echo $prod->product_id; ?>" class="btn btn-sm btn-danger">Delete</a>
</div>


  <?php echo form_close(); } ?>

</div>


<?php $this->load->view('dash/footer'); ?>