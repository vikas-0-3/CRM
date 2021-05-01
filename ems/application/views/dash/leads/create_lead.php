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

<h3 class="text-center"><b>CREATE LEAD</b></h3>

<!-- Form code -->



<div class="container-fluid p-3">
<?php echo form_open('leads/create_lead/'.$a, 'class="form-horizontal"'); ?>

  <p class="lead_info">&emsp;<i class="fas fa-users"></i>&emsp;Organization detail</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_organization" class="form-control form-control-sm" placeholder="Organization" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_website" class="form-control form-control-sm" placeholder="Organization Website" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_no_of_emp" class="form-control form-control-sm" placeholder="Staff" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_annual_revenue" class="form-control form-control-sm" placeholder="Annual Revinue" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_rating" class="form-control form-control-sm" placeholder="Rating" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_email" class="form-control form-control-sm" placeholder="Organization Email" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_phone" class="form-control form-control-sm" placeholder="Organization Phone" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_skype" class="form-control form-control-sm" placeholder="Organization Skype" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_twitter" class="form-control form-control-sm" placeholder="Organization Twitter" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_linkedin" class="form-control form-control-sm" placeholder="Organization Linked in" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_country" class="form-control form-control-sm" placeholder="Organization Country" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_state" class="form-control form-control-sm" placeholder="Organization State" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_city" class="form-control form-control-sm" placeholder="Organization City" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_street" class="form-control form-control-sm" placeholder="Organization Street" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_zip_code" class="form-control form-control-sm" placeholder="Organization Pin Code" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_currency" class="form-control form-control-sm" placeholder="Currency" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_exchange_rate" class="form-control form-control-sm" placeholder="Exchange Rate" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_last_activity_time" class="form-control form-control-sm" placeholder="Last Activity Time" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_success_rate" class="form-control form-control-sm" placeholder="Success Rate" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_prediction" class="form-control form-control-sm" placeholder="Prediction" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_fax" class="form-control form-control-sm" placeholder="Organization Fax" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_last_view" class="form-control form-control-sm" placeholder="Organization Last View" />
    </div>
    <div class="col">
    </div>
    <div class="col">
    </div>
    <div class="col">
    </div>
  </div>

  <p class="lead_info">&emsp;<i class="fas fa-user"></i>&emsp;Personal detail</p>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_owner_name" class="form-control form-control-sm" placeholder="Lead Owner" />
    </div>
    <div class="col">
        <input type="text" name="lead_owner_id" class="form-control form-control-sm" placeholder="Lead Owner Email" />
    </div>
    <div class="col">
        <input type="text" name="lead_contact_person" class="form-control form-control-sm" placeholder="Contact Person" />
    </div>
    <div class="col">
        <input type="text" name="lead_contact_person_phone" class="form-control form-control-sm" placeholder="Contact Person Phone" />
    </div>
    <div class="col">
        <input type="text" name="lead_contact_person_email" class="form-control form-control-sm" placeholder="Contact Person Email" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_status" class="form-control form-control-sm" placeholder="Lead Status" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_source" class="form-control form-control-sm" placeholder="Lead Source" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_title" class="form-control form-control-sm" placeholder="Lead Title" />
    </div>
    <div class="col">
        <input type="text" name="lead_created_by" class="form-control form-control-sm" placeholder="Created By" />
    </div>
    <div class="col">
        <input type="text" name="lead_created_by_id" class="form-control form-control-sm" placeholder="Created By Id" />
    </div>
  </div>


  <p class="lead_info">&emsp;<i class="far fa-question-circle"></i>&emsp;Lead Status</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_org_is_converted" class="form-control form-control-sm" placeholder="Is Converted" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_converted_person_name" class="form-control form-control-sm" placeholder="Converted Person Name" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_converted_email" class="form-control form-control-sm" placeholder="Converted Person Phone" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_converted_phone" class="form-control form-control-sm" placeholder="Converted Person Email" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_converted_account" class="form-control form-control-sm" placeholder="Converted Person Account" />
    </div>
  </div>

  <p class="lead_info">&emsp;<i class="fas fa-exchange-alt"></i>&emsp;Modification Status</p>
  <div class="row mb-2">
    <div class="col">
        <input type="text" name="lead_modify_by" class="form-control form-control-sm" placeholder="Modified By" />
    </div>
    <div class="col">
        <input type="text" name="lead_modify_by_id" class="form-control form-control-sm" placeholder="Modify By Email" />
    </div>
    <div class="col">
        <input type="text" name="lead_modify_time" class="form-control form-control-sm" placeholder="Modification Time" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_converted_deal_id" class="form-control form-control-sm" placeholder="Converted Deal Id" />
    </div>
    <div class="col">
        <input type="text" name="lead_org_last_view" class="form-control form-control-sm" placeholder="Last View" />
    </div>
  </div>


  <div class="form-outline">
    <textarea class="form-control" name="lead_org_des" id="form6Example7" rows="3" placeholder="Description"></textarea>
  </div>

  <input type="submit" name="create_lead" class="btn btn-sm btn-info mt-2" value="Submit">
  <?php echo form_close(); ?>

</div>


<?php $this->load->view('dash/footer'); ?>