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

?>
<?php $this->load->view('dash/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/table.css">

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
      <a class="btn btn-sm btn-light py-0 m-1" href="<?php echo site_url(); ?>product/create_product_path/"><span style="font-size:10px;font-weight:bolder;">Add</span></a>
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
  $query = $this->db->query('SELECT * FROM product');
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
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Cost Price</th>
              <th scope="col">Tax</th>
              <th scope="col">Status</th>
              <th scope="col">Owner</th>
              <th scope="col">Owner Email</th>
              <th scope="col">Owner Phone</th>
              <th scope="col">Category</th>
              <th scope="col">Operation</th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
              <?php  
                $product_list = $this->db->get_where('product', array( 'product_OrganizationId' => $a ));
                foreach($product_list->result() as $product)
                {
              ?>
            <tr>
              <th class="pt-3" scope="row" class="text-center"><?php echo $product->product_id; ?></th>
              <td class="pt-3" scope="row"><?php echo $product->product_code; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_name; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_Description; ?></td>

              <td scope="row">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $product->product_Image ).'" id="product_image" height="40" width="80" alt="Image not available" >'; ?>
              </td>
              <td class="pt-3" scope="row"><?php echo $product->product_UnitPrice; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_CostPrice; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_Tax; ?> %</td>
              <td class="pt-3" scope="row"><?php echo $product->product_status; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_owner; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_owner_id; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_owner_phone; ?></td>
              <td class="pt-3" scope="row"><?php echo $product->product_category; ?></td>
          
              <td class="pt-2" scope="row">
                <a href="<?php echo site_url(); ?>product/update_product_path/<?php echo $product->product_id; ?>" id="btn_info" class="btn btn-warning btn-sm px-1 text-white" ><i class="fas fa-info-circle" aria-hidden="true"></i></a>&ensp;
                <a id="btn_del" data-toggle="modal" data-target="#exampleModalCenter" data-vendor="<?php echo $product->product_id; ?>" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr
            <?php } ?>            
          </tbody>
        </table>
      </div>





<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle"><b>Confirm Delete</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert alert-danger">
        <b>Are you sure ?<br>you want to remove the Product ?</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?php echo site_url(); ?>leads/delete_lead/" class="btn btn-sm btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div> -->

<!-- modal over -->



</div>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue, td1;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
    $(document).ready(()=>{
      $("#topbar").css("background-color", "<?php echo $color2; ?>");
    });  
</script>

<?php $this->load->view('dash/footer'); ?>