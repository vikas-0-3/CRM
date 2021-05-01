<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user) { $a = $user->u_id; }
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
      <a class="btn btn-sm btn-light py-0 m-1" href="#" data-toggle="modal" data-target="#exampleModalCenter"><span style="font-size:10px;font-weight:bolder;">Add</span></a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Theme</span></button>
    </div>

  </div>
</div>



<div class="container-fluid row">
  <div class="record_count col-sm mt-1">
  <?php  
  $contact_list = $this->db->get_where('contact', array( 'org_id' => $a ));
  echo "<h5>Record count : ".$contact_list->num_rows()."</h5>";
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
              <th scope="col">Company Name</th>
              <th scope="col">Location</th>
              <th scope="col">Contact</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Operation</th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
            <?php  
                foreach($contact_list->result() as $contact)
                {
            ?>
            <tr>
              <th class="pt-2" scope="row" class="text-center"><?php echo $contact->cid; ?></th>
              <td class="pt-2" scope="row"><?php echo $contact->company_name; ?></td>
              <td class="pt-2" scope="row"><?php echo $contact->city; ?></td>
              <td class="pt-2" scope="row"><?php echo $contact->first_name." ".$contact->last_name; ?></td>
              <td class="pt-2" scope="row"><?php echo $contact->phone; ?></td>
              <td class="pt-2" scope="row"><?php echo $contact->email; ?></td>
              <td class="pt-1" scope="row">
                <a href="<?php echo site_url(); ?>task/update_task_path/<?php echo $contact->cid; ?>" id="btn_info" class="btn btn-warning btn-sm px-1 text-white" ><i class="fas fa-info-circle" aria-hidden="true"></i></a>&ensp;
                <a id="btn_del" data-toggle="modal" data-target="#exampleModalCenter" data-vendor="<?php echo $contact->cid; ?>" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr
            <?php } ?>            
          </tbody>
        </table>
      </div>
</div>




<!-- Modal to add task -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle"><b>ADD Contact</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>* fields are compulsory</p>
      <?php echo form_open_multipart('contact/create_contact/'.$a); ?>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="fname" placeholder="First name *" required >
          </div>
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="lname" placeholder="Last name">
          </div>
        </div>
        <br>
            <input type="text" class="form-control form-control-sm" name="cname" placeholder="Comany name *" required>
        <br>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="email" placeholder="Email">
          </div>
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone *" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="add1" placeholder="Address 1 ">
          </div>
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="add2" placeholder="Address 2">
          </div>
        </div>
        <br>
            <input type="text" class="form-control form-control-sm" name="city" placeholder="City *" required>
        <br>
            <input type="text" class="form-control form-control-sm" name="social" placeholder="Social">

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-sm btn-success" name="create_con" value="Confirm">
      </div>


        <?php echo form_close(); ?>
      </div>

    </div>
  </div>
</div>





<script>
    $(document).ready(function(){

    $("#topbar").css("background-color", "<?php echo $color2; ?>");

        $('#crtmenu a').bind("mouseover", function(){
            $(this).css("background-color", "<?php echo $color1; ?>");
            $(this).css("color", 'white'); 

            $(this).bind("mouseout", function(){
              $(this).css("background", 'white');
              $(this).css("color", 'black');
            })   
        })
        
      });  
</script>

<?php $this->load->view('dash/footer'); ?>