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
  $query = $this->db->query('SELECT * FROM task');
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
              <th scope="col">Task</th>
              <th scope="col">Given By</th>
              <th scope="col">Given by Email</th>
              <th scope="col">Given By Phone</th>
              <th scope="col">Creation Time</th>
              <th scope="col">Deadline</th>
              <th scope="col">Status</th>
              <th scope="col">Modified By</th>
              <th scope="col">Modification Time</th>
              <th scope="col">Description</th>
              <th scope="col">Operation</th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
            <?php  
                $task_list = $this->db->get_where('task', array( 'task_oid' => $a ));
                foreach($task_list->result() as $task)
                {
            ?>
            <tr>
              <th class="pt-2" scope="row" class="text-center"><?php echo $task->task_id; ?></th>
              <td class="pt-2" scope="row"><?php echo $task->task_name; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_given_by; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_given_by_email; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_given_by_phone; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_creation_time; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_deadline; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_status; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_modified_by; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_modification_time; ?></td>
              <td class="pt-2" scope="row"><?php echo $task->task_description; ?></td>
          
              <td class="pt-1" scope="row">
                <a href="<?php echo site_url(); ?>task/update_task_path/<?php echo $task->task_id; ?>" id="btn_info" class="btn btn-warning btn-sm px-1 text-white" ><i class="fas fa-info-circle" aria-hidden="true"></i></a>&ensp;
                <a id="btn_del" data-toggle="modal" data-target="#exampleModalCenter" data-vendor="<?php echo $task->task_id; ?>" class="btn btn-danger btn-sm px-1 text-white"><i class="fas fa-trash" aria-hidden="true"></i></a>
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