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
      <a class="btn btn-sm btn-light py-0 m-1" href="<?php echo site_url(); ?>leads/create_lead_path/"><span style="font-size:10px;font-weight:bolder;">Add</span></a>
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
  if($user->u_type == "a"){
    $leads_list = $this->db->get_where('leads', array( 'lead_org_id' => $a, 'lead_org_status !=' => 'deleted' ));
  }
  else {
    $leads_list = $this->db->get_where('leads', array( 'lead_org_id' => $a, 'lead_created_by_id' =>  $_SESSION['id'] ,'lead_org_status !=' => 'deleted' ));
  }
 
  echo "<h5>Record count : ".$leads_list->num_rows()."</h5>";
  ?>
  </div>
  <div class="form-inline justify-content-end col-sm mt-1">
    <i class="fas fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-2 w-30" type="text" id="myInput" onkeyup="myFunction()" placeholder="Type Something ..." title="Type in a name" aria-label="Search">
  </div>
</div>



<div id="scrolldiv"  class="scrollbar scrollbar-lady-lips mt-1">

<div class="table-responsive table-bordered text-nowrap">
        <!--Table-->
        <table class="table table-striped" id="myTable">

          <!--Table head-->
          <thead class="text-white" style="background-color: <?php echo $color1; ?>">
            <tr>
              <th scope=col>ID</th>
              <th scope=col>Owner</th>
              <th scope=col>Contact person</th>
              <th scope=col>Person phone</th>
              <th scope=col>Person email</th>
              <th scope=col>Status</th>
              <th scope=col>Source</th>
              <th scope=col>Organization</th>
              <th scope=col>Description</th>
              <th scope=col>Operation</th>
            </tr>
          </thead>
          <?php if($leads_list->num_rows() > 0) { ?>
          <tbody>
          <?php  
                foreach($leads_list->result() as $lead)
                {
          ?>
            <tr>
              <th scope="row" class="text-center"><?php echo $lead->lead_id; ?></th>
              <td scope="row"><?php echo $lead->lead_owner_name; ?></td>
              <td scope="row"><?php echo $lead->lead_contact_person; ?></td>
              <td scope="row"><?php echo $lead->lead_contact_person_phone; ?></td>
              <td scope="row"><?php echo $lead->lead_contact_person_email; ?></td>
              <td scope="row"><?php echo $lead->lead_org_status; ?></td>
              <td scope="row"><?php echo $lead->lead_org_source; ?></td>
              <td scope="row"><?php echo $lead->lead_organization; ?>
              <td scope="row"><?php echo $lead->lead_org_des; ?></td>
              <td scope="row">
                <a href="<?php echo site_url(); ?>leads/update_single_lead/<?php echo $lead->lead_id; ?>" id="btn_info" class="btn btn-warning btn-sm px-1 text-white" ><i class="fas fa-info-circle"></i></a>
                <a id="btn_del" onclick="delete_lead(<?php echo $lead->lead_id; ?>)" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php  } ?>
          </tbody>
          <?php  } else { ?>
          <tbody>
            <tr>No records added by you !</tr>
          </tbody> <?php } ?>
        </table>
      </div>


</div>


<script>

function delete_lead(x) {
      if (window.confirm('Want to Delete Lead?'))
      {
        var loc="<?php echo site_url(); ?>leads/delete_lead/"+x;
        window.location.href=loc;
      }
      else
      {
          // do nothing
      }
  }

</script>



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