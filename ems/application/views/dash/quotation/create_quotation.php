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
  $q=0;
//$id = $this->uri->segment(3);
?>

<?php $this->load->view('dash/header'); ?>

<style>
  *{
    font-size: 14px;
  }
    #topbar {
        background-color: <?php echo $color2; ?>;
    }
    .lead_info {
      background-color: <?php echo $color1; ?>;
      color: white;
    }
    ul {
      list-style: none;
    }
    #uom, #gst {
      -webkit-appearance: none;
    }
    #add_table_row {
      border-radius: 50%;
      float: right;
    }
    #add_table_row i {
      color: green;
    }
</style>

</head>
</body>

<h5 class="text-center"><b>CREATE QUOTATION</b></h5>

<div class="container-fluid px-4">
<?php echo form_open('quotation/create_quotation/'.$a); ?>
<p class="lead_info mb-0">&emsp;<i class="fas fa-user"></i>&emsp;Customer details</p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="py-0" scope="col">#</th>
          <th class="py-0" scope="col">Quotation Party</th>
          <th class="py-0" scope="col">Quotation Contact</th>
          <th class="py-0" scope="col">Quotation Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="py-0" scope="row">
          <?php  
            $query = $this->db->query('SELECT * FROM quotation');
            $num = (int)$query->num_rows();
            $num2 = $num+1;
            echo "Q00".$num2;
          ?>
          </th>
          <td class="py-0">
          <select id="customer" name="quotation_org" class="form-control form-control-sm">
            <option>Select Customer</option>
            <?php  
                $lead_list = $this->db->get_where('leads', array( 'lead_org_id' => $a ));
                foreach($lead_list->result() as $lead)
                { ?>
                <option value="<?php echo $lead->lead_organization; ?>"><?php echo $lead->lead_organization; ?></option>
                <?php } ?>
            </select>
          </td>
          <td class="py-0">
          <select id="person" name="quotation_contact" class="form-control form-control-sm">
            <option>Contact Person</option>
            <?php  
                $contact_list = $this->db->get_where('contact', array( 'org_id' => $a ));
                foreach($contact_list->result() as $con)
                { ?>
                <option value="<?php echo $con->first_name." ".$con->last_name; ?>"><?php echo $con->first_name." ".$con->last_name; ?></option>
                <?php } ?>
            </select>
          </td>
          <td class="py-0"><input type="date" id="q" name="quotation_date" class="form-control form-control-sm" placeholder="Date" /></td>
        </tr>
      </tbody>
    </table>





  <p class="lead_info mb-0">&emsp;<i class="fas fa-user"></i>&emsp;Product details&emsp;</p>

<table class="table table-bordered mb-0 product_table" style="font-size: 13px;" id="prod_tab">
<thead class="text" >
    <tr class="text-center">
      <th class="py-0" scope="col">#</th>
      <th class="py-0" scope="col">Part#&emsp;&emsp;&emsp;Product Description</th>
      <th class="py-0" scope="col">Qty</th>
      <th class="py-0" scope="col">UoM</th>
      <th class="py-0" scope="col">Unit Price</th>
      <th class="py-0" scope="col">Total</th>
      <th class="py-0" scope="col">GST</th>
      <th class="py-0" scope="col">GST Amount</th>
      <th class="py-0" scope="col">Grand Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="py-0" scope="row">1</th>
      <td class="py-0"> 
      <select id="Product" name="quotation_product[]" class="form-control form-control-sm" style="font-size: 12px;">
            <option>Part# and Product Description&emsp;&emsp;&emsp;</option>
            <?php  
                $product_list = $this->db->get_where('product', array( 'product_OrganizationId' => $a ));
                foreach($product_list->result() as $pro)
                { ?>
                <option value="<?php echo $pro->product_code."&ensp;->&emsp;".$pro->product_name."&emsp;".$pro->product_Description;; ?>"><?php echo $pro->product_code."&emsp;<b>".$pro->product_name."</b>&emsp;".$pro->product_Description;; ?></option>
                <?php } ?>
        </select>
      </td>

      <td class="py-0"><input type="text" id="qty" name="quotation_quantity[]" class="form-control form-control-sm quantity" placeholder="Qty" /></td>
      <td class="py-0">
      <select id="uom" name="quotation_uom[]" class="form-control form-control-sm">
            <option value="na">UOM&ensp;</option>
            <option value="Piece">Piece</option>
            <option value="Dozen">Dozen</option>
            <option value="Meter">Meter</option>
            <option value="Year">Year</option>
            <option value="Month">Month</option>
            <option value="Days">Days</option>
            <option value="Hrs">Hrs</option>
        </select>
      </td>
      <td class="py-0"><input type="text" id="up" name="quotation_unit_price[]" class="form-control form-control-sm text-right price" placeholder="Unit Price" /></td>
      <td class="py-0"><input type="text" id="ttl" name="quotation_total[]" class="form-control form-control-sm text-right total" placeholder="Total" value=""></td>
      <td class="py-0">
        <select id="gst" name="quotation_gst[]" class="form-control form-control-sm gst">
            <option value="18">18 %</option>
            <option value="00">&ensp;0 %</option>
            <option value="05">&ensp;5 %</option>
            <option value="12">12 %</option>
            <option value="18">18 %</option>
            <option value="28">28 %</option>
        </select>
      </td>
      <td class="py-0"><input type="text" id="gstamt" name="quotation_gstamt[]" class="form-control form-control-sm text-right gstamount" placeholder="GST Amount" value="" ></td>
      <td class="py-0"><input type="text" id="gttl" name="quotation_gttl[]" class="form-control form-control-sm text-right grandtotal" placeholder="Grand Total" value="" ></td>
    </tr>


  </tbody>
</table>
<p class="lead_info mt-0">&emsp;<button type="button" class="btn btn-sm px-1 py-0" id="add_table_row"><i class="fas fa-plus"></i></button></p>
 

<br>
<hr>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-9">
    <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Terms and Conditions</button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <ul>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_1" id="modal_check_1" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l1">Validity of Quotation: Till a week after quotation send.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_2" id="modal_check_2" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l2"><b>Payment Terms:</b> 50% Alongwith PO and rest 50% immediate on Delivery of the Material. Payment of supplied material should not be linked with any other product/s not included in this quotation or any extended professional services.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_3" id="modal_check_3" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l3"><b>Warranty :</b> Statndard Warranty As per OEM/Vendor/ Manufacturer terms unless mentioned specifically.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_4" id="modal_check_4" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l4"><b>Delivery :</b> Subject to the stock availbility with OEM/ Distributors, normally within 5-6 Weeks after Confirm PO and Advance Payment. For Laptop and Desktop Lead time may increase due to Covid19 scenerio. The order is Non-Cancellable once processed.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_5" id="modal_check_5" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l5"><b>Taxes: Extra As Applicable. Freight :</b> F.O.R. Dharamshala.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_6" id="modal_check_6" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l6">These prices are valid for the purchase of the above mentioned BOM as a Single deal and without any staggered delivery. Any Item not stated in this quotation will be considered as an addition and will be charged as per the mutual consent of customer and Accretive Technologies.</textarea></li>
              <li class="m-1" style="display:flex;"><input type="checkbox" name="check_7" id="modal_check_7" value="">&ensp;<textarea class="text" rows="4" cols="60" id="l7">These prices include supply of the material and assistance in One Time Implementation and Configuration of the material supplied by Accretive Technologies mentioned in this quotation. However extended professional services (if required by customer) will be provided on chargeable basis after receiving work order for the same.</textarea></li>
            </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="button" id="save_checkbox" class="btn btn-primary btn-sm" data-dismiss="modal">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <hr>


    <ul>
      <li id="c1"><b>Validity of Quotation:</b> Till a week after quotation send.</li>
      <li id="c2"><b>Payment Terms:</b> 50% Alongwith PO and rest 50% immediate on Delivery of the Material. Payment of supplied material should not be linked with any other product/s not included in this quotation or any extended professional services.</li>
      <li id="c3"><b>Warranty :</b> Statndard Warranty As per OEM/Vendor/ Manufacturer terms unless mentioned specifically.</li>
      <li id="c4"><b>Delivery :</b> Subject to the stock availbility with OEM/ Distributors, normally within 5-6 Weeks after Confirm PO and Advance Payment. For Laptop and Desktop Lead time may increase due to Covid19 scenerio. The order is Non-Cancellable once processed.</li>
      <li id="c5"><b>Taxes: Extra As Applicable. Freight :</b> F.O.R. Dharamshala.</li>
      <li id="c6">These prices are valid for the purchase of the above mentioned BOM as a Single deal and without any staggered delivery. Any Item not stated in this quotation will be considered as an addition and will be charged as per the mutual consent of customer and Accretive Technologies.</li>
      <li id="c7">These prices include supply of the material and assistance in One Time Implementation and Configuration of the material supplied by Accretive Technologies mentioned in this quotation. However extended professional services (if required by customer) will be provided on chargeable basis after receiving work order for the same.</li>
    </ul>
  </div>
  <div class="col-sm-3 text-right" style="border-left: 1px solid grey;">
  <h5 class="text-center"><b>BILLING</b></h5>
  <hr>
  <ul>
    <li><b>TOTAL : </b> <span id="b_total">0</span> </li>
    <li><b>GST : </b> <span id="b_gst">0</span> </li>
    <li class="row"><b><span class="col">Discount : <span></b> <span id="b_di" class="col-sm"><input type="text" id="discount" name="quotation_discount" class="form-control form-control-sm text-right" placeholder="Discount" /></span> </li>
    <hr>
    <li><b>GRAND TOTAL : </b> <span id="b_gttl">0</span> </li>
  </ul>
  </div>
</div>
</div>

  <input type="submit" name="create_quotation" class="btn btn-sm btn-info m-3 float-right" value="Submit">
  <?php echo form_close(); ?>

</div>

<script>
    $(document).ready(function(){

      $("#c1, #c2, #c3, #c4, #c5, #c6, #c7").css("display", "none");


      $("#save_checkbox").click(function() {
        var l1 = document.getElementById("l1").value;
        var l2 = document.getElementById("l2").value;
        var l3 = document.getElementById("l3").value;
        var l4 = document.getElementById("l4").value;
        var l5 = document.getElementById("l5").value;
        var l6 = document.getElementById("l6").value;
        var l7 = document.getElementById("l7").value;
        

        $("#modal_check_1").val(l1);
        $("#modal_check_2").val(l2);  
        $("#modal_check_3").val(l3);
        $("#modal_check_4").val(l4);
        $("#modal_check_5").val(l5);
        $("#modal_check_6").val(l6);
        $("#modal_check_7").val(l7);

        document.getElementById('c1').innerHTML = l1;
        document.getElementById('c2').innerHTML = l2;
        document.getElementById('c3').innerHTML = l3;
        document.getElementById('c4').innerHTML = l4;
        document.getElementById('c5').innerHTML = l5;
        document.getElementById('c6').innerHTML = l6;
        document.getElementById('c7').innerHTML = l7;


          if(document.getElementById('modal_check_1').checked) {
            document.getElementById('c1').style.display = "block";
          } else {
            document.getElementById('c1').style.display = "none";
          }
          if(document.getElementById('modal_check_2').checked) {
            document.getElementById('c2').style.display = "block";
          } else {
            document.getElementById('c2').style.display = "none";
          }
          if(document.getElementById('modal_check_3').checked) {
            document.getElementById('c3').style.display = "block";
          } else {
            document.getElementById('c3').style.display = "none";
          }
          if(document.getElementById('modal_check_4').checked) {
            document.getElementById('c4').style.display = "block";
          } else {
            document.getElementById('c4').style.display = "none";
          }
          if(document.getElementById('modal_check_5').checked) {
            document.getElementById('c5').style.display = "block";
          } else {
            document.getElementById('c5').style.display = "none";
          }
          if(document.getElementById('modal_check_6').checked) {
            document.getElementById('c6').style.display = "block";
          } else {
            document.getElementById('c6').style.display = "none";
          }
          if(document.getElementById('modal_check_7').checked) {
            document.getElementById('c7').style.display = "block";
          } else {
            document.getElementById('c7').style.display = "none";
          }
      });



      $("#add_table_row").click(function(){
        var data = "<tr><th class='py-0'>"+$("#prod_tab tr").length+"</th> <td class='py-0'><select name='quotation_product[]' class='form-control form-control-sm'><option>Part# and Product Description&emsp;&emsp;&emsp;<?php $product_list = $this->db->get_where('product', array( 'product_OrganizationId' => $a )); foreach($product_list->result() as $pro) {?> <option value='<?php echo $pro->product_code.'&ensp;->&emsp;'.$pro->product_name.'&emsp;'.$pro->product_Description; ?>'><?php echo $pro->product_code.'&ensp;->&emsp;'.$pro->product_name.'&emsp;'.$pro->product_Description; ?></option><?php } ?></option></select></td>     <td class='py-0'><input type='text' id='qty' name='quotation_quantity[]' class='form-control form-control-sm quantity' placeholder='Qty' /></td>       <td class='py-0'><select id='uom' name='quotation_uom[]' class='form-control form-control-sm'><option value='na'>UOM&ensp;</option><option value='Piece'>Piece</option><option value='Dozen'>Dozen</option><option value='Meter'>Meter</option><option value='Year'>Year</option><option value='Month'>Month</option><option value='Days'>Days</option><option value='Hrs'>Hrs</option></select></td>      <td class='py-0'><input type='text' id='up' name='quotation_unit_price[]' class='form-control form-control-sm text-right price' placeholder='Unit Price' /></td>    <td class='py-0'><input type='text' id='ttl' name='quotation_total[]' class='form-control form-control-sm text-right total' placeholder='Total'/></td>      <td class='py-0'><select id='gst' name='quotation_gst[]' class='form-control form-control-sm gst'><option value='18'>18 %</option><option value='00'>&ensp;0 %</option><option value='05'>&ensp;5 %</option><option value='12'>12 %</option><option value='18'>18 %</option><option value='28'>28 %</option></select></td>        <td class='py-0'><input type='text' id='gstamt' name='quotation_gstamt[]' class='form-control form-control-sm text-right gstamount' placeholder='GST Amount'  /></td>         <td class='py-0'><input type='text' id='gttl' name='quotation_gttl[]' class='form-control form-control-sm text-right grandtotal' placeholder='Grand Total' /></td> </tr>";
        $('#prod_tab').append(data);
      });


      (function() {
        "use strict";

        $(".product_table").on("change", "input", function() {
          var row = $(this).closest("tr");
          var qty = parseFloat(row.find(".quantity").val());
          var price = parseFloat(row.find(".price").val());
          var gst = parseFloat(row.find(".gst").val());
          var total = qty * price;
          var gstamt = ((gst/100)*total);
          row.find(".total").val(isNaN(total) ? "" : total);
          row.find(".gstamount").val(isNaN(total) ? "" : gstamt);
          row.find(".grandtotal").val(isNaN(total) ? "" : total+gstamt);


          var sum = 0;
          var gstsum = 0;
          var grandsum = 0;
          $('.total').each(function(){
              sum += parseFloat($(this).val());
          });
          $('.gstamount').each(function(){
              gstsum += parseFloat($(this).val());
          });
          $('.grandtotal').each(function(){
            grandsum += parseFloat($(this).val());
          });

        $("#b_total").html(sum);
        $("#b_gst").html(gstsum);
        $("#b_gttl").html(grandsum);

        $("#discount").bind("change keyup", function(){
          var dis = $("#discount").val();
          $("#b_gttl").html(grandsum-dis);
        });



        });
      })();


    });


</script>

<?php $this->load->view('dash/footer'); ?>