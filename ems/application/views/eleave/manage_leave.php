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
  $query = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a ));
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
            <th scope="col">#</th>
                <th scope="col">Emp Name</th>
                <th scope="col">Emp Email</th>
                <th scope="col">Emp Phone</th>
                <th scope="col">Leave Purpose</th>
                <th scope="col">Leave Date</th>
                <th scope="col">Date From</th>
                <th scope="col">Date To</th>
                <th scope="col">Leave Status</th>
                <th scope="col">Operation</th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
            <?php  
                foreach($query->result() as $q)
                {
                    $username_list = $this->db->get_where('users', array( 'u_email' => $q->leave_emp_email ));
                    foreach($username_list->result() as $ul)
                    {
                        $user_name = $ul->u_name;
                        $user_phone = $ul->u_phone;
                    }
            ?>
            <tr>
            <th class="pt-2" scope="row" class="text-center"><?php echo $q->leave_id; ?></th>
                <td class="pt-2" scope="row"><?php echo $user_name; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_emp_email; ?></td>
                <td class="pt-2" scope="row"><?php echo $user_phone; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_purpose; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_date; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_from_date; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_to_date; ?></td>
                <td class="pt-2" scope="row"><?php echo $q->leave_status; ?></td>
                <td class="pt-1" scope="row">
                <a href="#" id="btn_info" class="btn btn-success btn-sm px-1 text-white" onclick="accept(<?php echo $q->leave_id; ?>);"><i class="fas fa-check" aria-hidden="true"></i></a>&ensp;
                <a href="#" id="btn_del" class="btn btn-danger btn-sm px-1 text-white" onclick="reject(<?php echo $q->leave_id; ?>);"><i class="fas fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>
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
        <h5 class="modal-title text-center" id="exampleModalLongTitle"><b>ADD TASK</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Add task part here</p>
        <form>




        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-success">Confirm</button>
      </div>
    </div>
  </div>
</div>

<script>

    function accept(x) {
      if (window.confirm('Want to accept Leave?'))
      {
        var loc="<?php echo site_url(); ?>eleave/accept_leave/"+x;
        window.location.href=loc;
      }
      else
      {
          // do nothing
      }
    }

    function reject(x) {
      if (window.confirm('Want to Reject Leave?'))
      {
        var loc="<?php echo site_url(); ?>eleave/reject_leave/"+x;
        window.location.href=loc;
      }
      else
      {
          // do nothing
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