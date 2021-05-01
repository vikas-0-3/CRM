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

//$id = $this->uri->segment(3);
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
</style>

</head>
</body>

<h3 class="text-center"><b>CREATE PRODUCT</b></h3>



<div class="container-fluid p-4">
<?php echo form_open_multipart('product/create_product/'.$a); ?>
<p class="lead_info">&emsp;<i class="fas fa-user"></i>&emsp;Product details</p>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Product Name" />
    </div>
    <div class="col">
        <input type="text" name="product_code" class="form-control form-control-sm" placeholder="Product Code" />
    </div>
    <div class="col">
        <input type="text" name="product_owner" class="form-control form-control-sm" placeholder="Product Owner" />
    </div>
    <div class="col">
        <input type="text" name="product_owner_id" class="form-control form-control-sm" placeholder="Owner Email" />
    </div>
    <div class="col">
        <input type="text" name="product_owner_phone" class="form-control form-control-sm" placeholder="Owner Phone" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <!-- <input type="text" name="product_category" class="form-control form-control-sm" placeholder="Product Catogory" /> -->
        <select id="Product" name="product_category" class="form-control form-control-sm">
            <option> Category</option>
            <?php  
                $category_list = $this->db->get_where('category', array( 'category_org_id' => $a ));
                foreach($category_list->result() as $cat)
                { ?>
                <option value="<?php echo $cat->category_name; ?>"><?php echo $cat->category_name; ?></option>
                <option type="submit" class="form-control form-control-sm"></option>
                <?php } ?>
        </select>
    </div>
    <div class="col">
        <input type="text" name="product_sub_category" class="form-control form-control-sm" placeholder="Product Sub Category" />
    </div>
    <div class="col">
        <input type="text" name="vendor_name" class="form-control form-control-sm" placeholder="Vendor Name" />
    </div>
    <div class="col">
        <input type="text" name="vendor_id" class="form-control form-control-sm" placeholder="Vendor Email" />
    </div>
    <div class="col">
        <input type="text" name="vendor_phone" class="form-control form-control-sm" placeholder="Venor Phone" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_Tag" class="form-control form-control-sm" placeholder="Product Tag" />
    </div>
    <div class="col">
        <!-- <input type="text" name="product_Oem" class="form-control form-control-sm" placeholder="Product Oem" /> -->
        <select name="product_Oem" class="form-control form-control-sm">
            <option> OEM</option>
            <?php  
                $oem_list = $this->db->get_where('oem', array( 'oem_org_id' => $a ));
                foreach($oem_list->result() as $oem)
                { ?>
                <option value="<?php echo $oem->oem_name; ?>"><?php echo $oem->oem_name; ?></option>
                <?php } ?>
        </select>
    </div>
    <div class="col">
        <input type="text" name="product_Hsn" class="form-control form-control-sm" placeholder="Hsn No" />
    </div>
    <div class="col">
        <input type="text" name="product_LeadId" class="form-control form-control-sm" placeholder="Lead Id" />
    </div>
    <div class="col">
        <input type="text" name="product_status" class="form-control form-control-sm" placeholder="Product Status" />
    </div>
  </div>


  <p class="lead_info">&emsp;<i class="fas fa-users"></i>&emsp;More detail</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_manufacturer" class="form-control form-control-sm" placeholder="Product Manufacturer" />
    </div>
    <div class="col">
        <input type="text" name="product_UnitPrice" class="form-control form-control-sm" placeholder="Unit Price" />
    </div>
    <div class="col">
        <input type="text" name="product_CostPrice" class="form-control form-control-sm" placeholder="Cost Price" />
    </div>
    <div class="col">
        <input type="text" name="product_InStock" class="form-control form-control-sm" placeholder="In Stock" />
    </div>
    <div class="col">
        <input type="text" name="product_Tax" class="form-control form-control-sm" placeholder="Tax" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="file" name="media_file" class="form-control form-control-sm" placeholder="Image" />
    </div>
    <div class="col">
        <input type="text" name="product_QuantityOrdered" class="form-control form-control-sm" placeholder="Quantity Ordered" />
    </div>
    <div class="col">
        <input type="text" name="product_Handler" class="form-control form-control-sm" placeholder="Product Handler" />
    </div>
    <div class="col">
        <input type="text" name="product_HandlerId" class="form-control form-control-sm" placeholder="Handlrer Email" />
    </div>
    <div class="col">
        <input type="text" name="product_HandlerPhone" class="form-control form-control-sm" placeholder="Handler Phone" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_OpeningStock" class="form-control form-control-sm" placeholder="Opening Stock" />
    </div>
    <div class="col">
        <input type="text" name="product_OpeningStockValue" class="form-control form-control-sm" placeholder="Opening Stock Value" />
    </div>
    <div class="col">
        <input type="text" name="product_Discountable" class="form-control form-control-sm" placeholder="Discountable" />
    </div>
    <div class="col">
    <input type="text" name="product_ApplyDiscount" class="form-control form-control-sm" placeholder="Apply Discount" />
    </div>
    <div class="col">
    <input type="text" name="product_ExpiryDate" class="form-control form-control-sm" placeholder="Expiry Date" />
    </div>
  </div>

  <div class="row mb-2">
  <div class="col">
        <input type="text" name="product_CommisionRate" class="form-control form-control-sm" placeholder="Commision Rate" />
    </div>
    <div class="col">
        <input type="text" name="product_PackingType" class="form-control form-control-sm" placeholder="Packing Type" />
    </div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
  </div>




  <p class="lead_info">&emsp;<i class="far fa-question-circle"></i>&emsp;Product Measurement</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_Color" class="form-control form-control-sm" placeholder="Color" />
    </div>
    <div class="col">
        <input type="text" name="product_Size" class="form-control form-control-sm" placeholder="Size" />
    </div>
    <div class="col">
        <input type="text" name="product_Measurement" class="form-control form-control-sm" placeholder="Measurement" />
    </div>
    <div class="col">
        <input type="text" name="product_UsageUnit" class="form-control form-control-sm" placeholder="Usage Unit" />
    </div>
    <div class="col"></div>
  </div>

  <p class="lead_info">&emsp;<i class="fas fa-exchange-alt"></i>&emsp;Sale details</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="product_SalesStartDate" class="form-control form-control-sm" placeholder="Sales Start Date" />
    </div>
    <div class="col">
        <input type="text" name="product_SalesEndDate" class="form-control form-control-sm" placeholder="Sales End Date" />
    </div>
    <div class="col">
        <input type="text" name="product_SupportStartDate" class="form-control form-control-sm" placeholder="Support Start Date" />
    </div>
    <div class="col">
        <input type="text" name="product_SupportEndDate" class="form-control form-control-sm" placeholder="Support End Date" />
    </div>
    <div class="col">
        <input type="text" name="product_QuotationId" class="form-control form-control-sm" placeholder="Quotation Id" />
    </div>
  </div>


  <div class="form-outline">
    <textarea class="form-control" name="product_Description" id="form6Example7" rows="3" placeholder="Description"></textarea>
  </div>

  <input type="submit" name="create_product" class="btn btn-sm btn-info mt-2" value="Submit">
  <?php echo form_close(); ?>

</div>


<?php $this->load->view('dash/footer'); ?>