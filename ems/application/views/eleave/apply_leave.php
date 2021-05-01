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

</style>

</head>
</body>

<h3 class="text-center"><b>Apply Leave</b></h3>

<!-- Form code -->



<div class="container-fluid p-3">
<?php echo form_open('eleave/apply_emp_leave/'.$a, 'class="form-horizontal"'); ?>



  <p class="lead_info">&emsp;<i class="fas fa-user"></i>&emsp;Leave detail</p>
  <!-- 2 column grid layout with text inputs for the first and last names -->

  <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th class="py-0" scope="col">Employee Email</th>
          <th class="py-0" scope="col">Leave Purpose</th>
          <th class="py-0" scope="col">From Date</th>
          <th class="py-0" scope="col">To Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="py-1"><input type="text" name="leave_emp_email" class="form-control form-control-sm" placeholder="Employee Email" /></td>
          <td class="py-1"><input type="text" name="leave_emp_purpose" class="form-control form-control-sm" placeholder="Leave Purpose" /></td>
          <td class="py-1"><input type="date" name="leave_from_date" class="form-control form-control-sm" placeholder="Date" /></td>
          <td class="py-1"><input type="date" name="leave_to_date" class="form-control form-control-sm" placeholder="Date" /></td>
        </tr>
      </tbody>
    </table>




  <div class="form-outline">
    <textarea class="form-control" name="leave_des" id="form6Example7" rows="3" placeholder="Description"></textarea>
  </div>

  <input type="submit" name="create_leave" class="btn btn-sm btn-info float-right mt-2" value="Apply">
  <?php echo form_close(); ?>

</div>


<?php $this->load->view('dash/footer'); ?>