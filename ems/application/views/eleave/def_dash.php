<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$color_theme2 = "#778899";
$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $un = $col->user_id;
    $color1 = $col->color_1;
    $color_theme2 = $col->color_2;
  }
  $users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user)
  {
    $a = $user->u_id;
  }

  if($user->u_type == "a"){ 
    $query0 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a ));
    $query1 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'accepted' ));
    $query2 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'pending' ));
    $query3 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'rejected' ));
  }
  else {
    $query0 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_emp_email' =>  $_SESSION['id'] ));
    $query1 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'accepted', 'leave_emp_email' =>  $_SESSION['id'] ));
    $query2 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'pending', 'leave_emp_email' =>  $_SESSION['id'] ));
    $query3 = $this->db->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'rejected', 'leave_emp_email' =>  $_SESSION['id'] ));
  }

  $jan = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '1', 'leave_emp_email' =>  $_SESSION['id'] ));
  $feb = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '2', 'leave_emp_email' =>  $_SESSION['id'] ));
  $mar = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '3', 'leave_emp_email' =>  $_SESSION['id'] ));
  $apr = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '4', 'leave_emp_email' =>  $_SESSION['id'] ));
  $may = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '5', 'leave_emp_email' =>  $_SESSION['id'] ));
  $jun = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '6', 'leave_emp_email' =>  $_SESSION['id'] ));
  $jul = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '7', 'leave_emp_email' =>  $_SESSION['id'] ));
  $aug = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '8', 'leave_emp_email' =>  $_SESSION['id'] ));
  $sep = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '9', 'leave_emp_email' =>  $_SESSION['id'] ));
  $oct = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '10', 'leave_emp_email' =>  $_SESSION['id'] ));
  $nov = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '11', 'leave_emp_email' =>  $_SESSION['id'] ));
  $dec = $this->db->get_where('emp_leave', array( 'Month(leave_date)' => '12', 'leave_emp_email' =>  $_SESSION['id'] ));



  $this->load->view('dash/header');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/table.css">
<style>
    body {
        padding: 0;
    }
    #topcards {
        height: 400px;
    }
    .card {
        width: 20rem;
        margin: 10px;
        transition: transform .5s;
    }
    .card:hover {
        cursor: pointer;
        transform: scale(1.05);
    }
    .card h5 {
      text-align: center;
      color: <?php echo $color1; ?>;
    }
    .card-text {
      line-height: 5px;
    }
    .container {
        box-shadow: 0 0 10px 0 grey;
        background-color: white;
        position: absolute;
        left: 50%;
        top: 60%;
        transform: translate(-50%, -50%);
        height: 400px;
        overflow-y: scroll;
    }
    ::-webkit-scrollbar {
      width: 0px;
    }

    #baselinks {
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Application', 'Leave per month'],
  ['January', <?php echo $jan->num_rows(); ?>],
  ['February', <?php echo $feb->num_rows(); ?>],
  ['March', <?php echo $mar->num_rows(); ?>],
  ['April', <?php echo $apr->num_rows(); ?>],
  ['May', <?php echo $may->num_rows(); ?>],
  ['June', <?php echo $jun->num_rows(); ?>],
  ['July', <?php echo $jul->num_rows(); ?>],
  ['August', <?php echo $aug->num_rows(); ?>],
  ['September', <?php echo $sep->num_rows(); ?>],
  ['October', <?php echo $oct->num_rows(); ?>],
  ['November', <?php echo $nov->num_rows(); ?>],
  ['December', <?php echo $dec->num_rows(); ?>]
]);

  var options = {'title':'Average Leave', 'width':650, 'height':400};
  var chart = new google.visualization.PieChart(document.getElementById('curve_chart'));
  chart.draw(data, options);
}
</script>

</head>
<body>

<div class="container-fluid" id="topcards">
<div class="row text-center">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Total Application</h5>
    <hr>
    <h1 class="text-center"><?php echo $query0->num_rows(); ?></h1>
    <hr>
    <a href="<?php echo site_url(); ?>eleave/manage_leave" class="card-link">View Leave</a>
    <a class="card-link">Another link</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Accepted</h5>
    <hr>
    <h1 class="text-center"><?php echo $query1->num_rows(); ?></h1>
    <hr>
    <a class="card-link">View Leave</a>
    <a class="card-link">Another link</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Pending</h5>
    <hr>
    <h1 class="text-center"><?php echo $query2->num_rows(); ?></h1>
    <hr>    
    <a class="card-link">Accept All</a>
    <a class="card-link">Reject All</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Rejected</h5>
    <hr>
    <h1 class="text-center"><?php echo $query3->num_rows(); ?></h1>
    <hr>    
    <a class="card-link">View Reject</a>
    <a class="card-link">Manage Reject</a>
  </div>
</div>

</div>

</div>



<!-- center container -->


<div class="container">
<h3 class="text-center m-1"><?php if($user->u_type == "a"){ ?> Latest Applications <?php } else { ?> Application History <?php } ?></h3>
<hr>
<?php if($user->u_type == "a"){ ?> 
    <div class="row">

        <table class="table table-striped mx-2" id="myTable">
            <thead class="text-white" style="background-color: <?php echo $color1; ?>">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Emp Name</th>
                <th scope="col">Emp Email</th>
                <th scope="col">Emp Phone</th>
                <th scope="col">Leave Purpose</th>
                <th scope="col">Date From</th>
                <th scope="col">Date To</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            <?php  
                $leave_list = $this->db->limit(10)->get_where('emp_leave', array( 'leave_org_id' => $a, 'leave_status' => 'pending' ));
                foreach($leave_list->result() as $ll)
                {
                    $username_list = $this->db->get_where('users', array( 'u_email' => $ll->leave_emp_email ));
                    foreach($username_list->result() as $ul){}

            ?>
            <tr> <!--// check ul and ll while fetching data // i use nested loop -->
                <th class="pt-2" scope="row" class="text-center"><?php echo $ll->leave_id; ?></th>
                <td class="pt-2" scope="row"><?php echo $ul->u_name; ?></td>
                <td class="pt-2" scope="row"><?php echo $ll->leave_emp_email; ?></td>
                <td class="pt-2" scope="row"><?php echo $ul->u_phone; ?></td>
                <td class="pt-2" scope="row"><?php echo $ll->leave_purpose; ?></td>
                <td class="pt-2" scope="row"><?php echo $ll->leave_from_date; ?></td>
                <td class="pt-2" scope="row"><?php echo $ll->leave_to_date; ?></td>
                <td class="pt-1" scope="row">
                <a href="#" id="btn_info" class="btn btn-success btn-sm px-1 text-white" onclick="accept(<?php echo $ll->leave_id; ?>);"><i class="fas fa-check" aria-hidden="true"></i></a>&ensp;
                <a href="#" id="btn_del" class="btn btn-danger btn-sm px-1 text-white" onclick="reject(<?php echo $ll->leave_id; ?>);"><i class="fas fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>            
            </tbody>
        </table>

    </div>
  <?php } else {?>
  <center><div id="curve_chart" class="m-0 p-0" style="width: 900px; height: 300px"></div></center>
  <?php } ?>
</div>






<!-- base links -->

<div class="container-fluid" id="baselinks">
  <div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">

    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light m-1">Import</button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light m-1">Export</button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light m-1" data-toggle="modal" data-target="#exampleModal">Theme</button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light m-1">Edit </button>
    </div>
    <div class="btn-group dropup" role="group" aria-label="Basic example">
      <button class="btn btn-sm btn-light m-1 dropdown-toggle" type="button" data-toggle="dropdown">Create</button>
        <div class="dropdown-menu" id="crtmenu">
            <a class="dropdown-item" href="<?php echo site_url(); ?>eleave/apply_leave">Apply Leave</a>
            <a class="dropdown-item" href="<?php echo site_url(); ?>eleave/manage_leave">Manage Leave</a>
        </div>
    </div>

  </div>
</div>





<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Select Your Theme</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
      <?php echo form_open('theme/change_theme/'.$un); ?>


        <div class="btn-group" role="group" aria-label="Third group">
                <input type="submit" name="def" class="btn btn-sm p-2 my-1" style="background-color:#36454f;color:white;" value="Default">
              </div>
          <div class="modal_buttons">


              <div class="btn-group" role="group" aria-label="Third group">
                <input type="submit" name="inp1" class="btn btn-sm btn-dark px-3 py-2 my-1" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp2" class="btn btn-sm btn-danger px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp3" class="btn btn-sm btn-secondary px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp4" class="btn btn-sm px-3 py-2" style="background-color:brown;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp5" class="btn btn-sm btn-warning px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp6" class="btn btn-sm btn-success px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp7" class="btn btn-sm px-3 py-2" style="background-color:orange;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp8" class="btn btn-sm px-3 py-2" style="background-color:pink;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp9" class="btn btn-sm px-3 py-2" style="background-color:purple;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp10" class="btn btn-sm btn-primary px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp11" class="btn btn-sm px-3 py-2" style="background-color:teal;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp12" class="btn btn-sm btn-info px-3 py-2" value="&emsp; &emsp;">
              </div>

              <?php echo form_close(); ?>

          </div><br>
          <center><h3><b>OR</b></h3></center>

          <?php echo form_open('theme/change_select_theme/'.$un); ?>

              <div class="text-center">
                <label for="color_1">First color : </label>
                <input type="color" id="favcolor" name="color_1" value="#000000">&ensp;

                <label for="color_2">Second color : </label>
                <input type="color" id="favcolor2" name="color_2" value="#ffffff">&ensp;

                <input type="submit" name="change_user_select_color" class="btn btn-sm btn-primary" value="Confirm">
              </div>
        
          <?php echo form_close(); ?>

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
        var bb = '<?php echo $color_theme2; ?>';
        $("#topcards, #baselinks").css("background-color",bb);
        
        $('#crtmenu a').bind("mouseover", function(){
            $(this).css("background-color", bb);
            $(this).css("color", 'white'); 

            $(this).bind("mouseout", function(){
              $(this).css("background", 'white');
              $(this).css("color", 'black');
            })   
        })
        
      });  
</script>

<?php $this->load->view('dash/footer'); ?>