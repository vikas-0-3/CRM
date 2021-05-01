
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
  $this->load->view('dash/header');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/table.css">
<!-- <style>
  #btn_pdf {

  }
</style> -->
</head>
</body>



<div class="container-fluid" id="topbar">
  <div class="btn-toolbar" id="topbuttons" role="toolbar" aria-label="Toolbar with button groups">

    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Import</span></button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Export</span></button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Edit</span> </button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <a class="btn btn-sm btn-light py-0 m-1" href="<?php echo site_url(); ?>quotation"><span style="font-size:10px;font-weight:bolder;">Add</span></a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1" data-toggle="modal" data-target="#exampleModal"><span style="font-size:10px;font-weight:bolder;">Theme</span></button>
    </div>

  </div>
</div>

<?php $this->load->view('dash/theme_modal'); ?>

<div class="container-fluid row">
  <div class="record_count col-sm mt-1">
  <?php  
  $query = $this->db->query('SELECT * FROM quotation');
  echo "<h5>Record count : ".$query->num_rows()."</h5>";
  ?>
  </div>
  <div class="form-inline justify-content-end col-sm mt-1">
    <i class="fas fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-2 w-30" type="text" id="myInput" onkeyup="myFunction()" placeholder="Type Something ..." title="Type in a name" aria-label="Search">
  </div>
</div>


<div id="scrolldiv"  class="scrollbar scrollbar-lady-lips px-3 mt-1">

    <div class="table-responsive table-bordered text-nowrap">
        <!--Table-->
        <table class="table table-striped" id="myTable">

          <!--Table head-->
          <thead class="text-white" style="background-color: <?php echo $color1; ?>">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Contact</th>
              <th scope="col">Date and Time</th>
              <th scope="col">Product Description</th>
              <th scope="col">Quantity</th>
              <th scope="col">Unit Price</th>
              <th scope="col">GST</th>
              <th scope="col">Total</th>
              <th scope="col">Grand Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php  
                $quot_list = $this->db->get_where('quotation', array( 'quotation_org_id' => $a ));
                foreach($quot_list->result() as $quot)
                {
            ?>
            <tr>
              <th class="pt-2" scope="row"><?php echo $quot->quotation_id; ?></th>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_org; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_date_time; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_product; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_quantity; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_unit_price; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_gst. " %"; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_total; ?></td>
              <td class="pt-2" scope="row"><?php echo $quot->quotation_grand_total; ?></td>
          
              <td class="pt-1" scope="row">
                <a href="<?php echo site_url(); ?>product/update_product_path/<?php echo $quot->quotation_id; ?>" id="btn_info" title="Edit" class="btn btn-warning btn-sm px-1 text-white" ><i class="fas fa-info-circle" aria-hidden="true"></i></a>&ensp;
                <a id="btn_del" data-toggle="modal" title="delete" data-target="#exampleModalCenter" data-vendor="<?php echo $quot->quotation_id; ?>" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-trash" aria-hidden="true"></i></a>
                <a href="<?php echo site_url(); ?>excel/export_csv/<?php echo $quot->quotation_id; ?>" id="btn_excel" href="#" title="Print in Excel" class="btn btn-success btn-sm px-1 text-white"><i class="fas fa-file-excel"></i></a>
                <a href="<?php echo site_url(); ?>excel/export_pdf/<?php echo $quot->quotation_id; ?>" id="btn_pdf" href="#" title="Print in Pdf" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-file-pdf"></i></a>
              </td>
            </tr>
            <?php } ?>            
          </tbody>
        </table>
      </div>
</div>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue, td1;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>




<script>
    $(document).ready(function(){
        $("#topbar").css("background-color", "<?php echo $color2; ?>");
    });  
</script>

<?php $this->load->view('dash/footer'); ?>