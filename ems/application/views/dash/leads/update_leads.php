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
    .form-label {
      padding: 0;
      margin: 0;
      font-size: 12px;
      font-weight: bold;
    }

</style>

</head>
</body>
<h3 class="text-center"><b>UPDATE lEADS</b></h3>


<?php 

echo form_open('leads/update_lead/'.$this->uri->segment(3)); 
$leads_list = $this->db->get_where('leads', array( 'lead_id' => $this->uri->segment(3) ));
foreach($leads_list->result() as $lead)
{?>


<div class="container-fluid p-3">
<p class="lead_info">&emsp;<i class="fas fa-user"></i>&emsp;Personal detail</p>
  <div class="row mb-1">
    <div class="col">
        <label class="form-label">Lead Owner Name</label>
        <input type="text" name="lead_owner_name" class="form-control form-control-sm" value="<?php echo $lead->lead_owner_name; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Lead Owner Email</label>
        <input type="text" name="lead_owner_id" class="form-control form-control-sm" value="<?php echo $lead->lead_owner_id; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Contact Person</label>
        <input type="text" name="lead_contact_person" class="form-control form-control-sm" value="<?php echo $lead->lead_contact_person; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Contact Person Phone</label>
        <input type="text" name="lead_contact_person_phone" class="form-control form-control-sm" value="<?php echo $lead->lead_contact_person_phone; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Contact Person Email</label>
        <input type="text" name="lead_contact_person_email" class="form-control form-control-sm" value="<?php echo $lead->lead_contact_person_email; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
    <label class="form-label">Lead Status</label>
        <input type="text" name="lead_org_status" class="form-control form-control-sm" value="<?php echo $lead->lead_org_status; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Lead Source</label>
        <input type="text" name="lead_org_source" class="form-control form-control-sm" value="<?php echo $lead->lead_org_source; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Lead Title</label>
        <input type="text" name="lead_org_title" class="form-control form-control-sm" value="<?php echo $lead->lead_org_title; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Created By</label>
        <input type="text" name="lead_created_by" class="form-control form-control-sm" value="<?php echo $lead->lead_created_by; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Creted By Email</label>
        <input type="text" name="lead_created_by_id" class="form-control form-control-sm" value="<?php echo $lead->lead_created_by_id; ?>" />
    </div>
  </div>

  <p class="lead_info mt-4">&emsp;<i class="fas fa-users"></i>&emsp;Organization detail</p>
  <div class="row mb-1">
    <div class="col">
    <label class="form-label">Organization Name</label>
        <input type="text" name="lead_organization" class="form-control form-control-sm" value="<?php echo $lead->lead_organization; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Website</label>
        <input type="text" name="lead_org_website" class="form-control form-control-sm" value="<?php echo $lead->lead_org_website; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Staff</label>
        <input type="text" name="lead_org_no_of_emp" class="form-control form-control-sm" value="<?php echo $lead->lead_org_no_of_emp; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Annual Revenue</label>
        <input type="text" name="lead_org_annual_revenue" class="form-control form-control-sm" value="<?php echo $lead->lead_org_annual_revenue; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Ratings</label>
        <input type="text" name="lead_org_rating" class="form-control form-control-sm" value="<?php echo $lead->lead_org_rating; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
    <label class="form-label">Organization Email</label>
        <input type="text" name="lead_org_email" class="form-control form-control-sm" value="<?php echo $lead->lead_org_email; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Phone</label>
        <input type="text" name="lead_org_phone" class="form-control form-control-sm" value="<?php echo $lead->lead_org_phone; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Skype</label>
        <input type="text" name="lead_org_skype" class="form-control form-control-sm" value="<?php echo $lead->lead_org_skype; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Twitter</label>
        <input type="text" name="lead_org_twitter" class="form-control form-control-sm" value="<?php echo $lead->lead_org_twitter; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization LinkedIn</label>
        <input type="text" name="lead_org_linkedin" class="form-control form-control-sm" value="<?php echo $lead->lead_org_linkedin; ?>"in" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
    <label class="form-label">Organization Country</label>
        <input type="text" name="lead_org_country" class="form-control form-control-sm" value="<?php echo $lead->lead_org_country; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization State</label>
        <input type="text" name="lead_org_state" class="form-control form-control-sm" value="<?php echo $lead->lead_org_state; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization City</label>
        <input type="text" name="lead_org_city" class="form-control form-control-sm" value="<?php echo $lead->lead_org_city; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Street</label>
        <input type="text" name="lead_org_street" class="form-control form-control-sm" value="<?php echo $lead->lead_org_street; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Pin Code</label>
        <input type="text" name="lead_org_zip_code" class="form-control form-control-sm" value="<?php echo $lead->lead_org_zip_code; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
    <label class="form-label">Organization Currency</label>
        <input type="text" name="lead_org_currency" class="form-control form-control-sm" value="<?php echo $lead->lead_org_currency; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Exchange Rate</label>
        <input type="text" name="lead_org_exchange_rate" class="form-control form-control-sm" value="<?php echo $lead->lead_org_exchange_rate; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Last Activity Time</label>
        <input type="text" name="lead_org_last_activity_time" class="form-control form-control-sm" value="<?php echo $lead->lead_org_last_activity_time; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Organization Success Rate</label>
        <input type="text" name="lead_org_success_rate" class="form-control form-control-sm" value="<?php echo $lead->lead_org_success_rate; ?>" />
    </div>
    <div class="col">
    <label class="form-label">Lead Prediction</label>
        <input type="text" name="lead_org_prediction" class="form-control form-control-sm" value="<?php echo $lead->lead_org_prediction; ?>" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
        <label class="form-label">Organization Fax</label>
        <input type="text" name="lead_org_fax" class="form-control form-control-sm" value="<?php echo $lead->lead_org_fax; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Organization Last View</label>
        <input type="text" name="lead_org_last_view" class="form-control form-control-sm" value="<?php echo $lead->lead_org_last_view; ?>" />
    </div>

    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
  </div>



  <p class="lead_info mt-4">&emsp;<i class="far fa-question-circle"></i>&emsp;Lead Status</p>
  <div class="row mb-1">
    <div class="col">
        <label class="form-label">Is Lead Converted</label>
        <input type="text" name="lead_org_is_converted" class="form-control form-control-sm" value="<?php echo $lead->lead_org_is_converted; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Converted Person Name</label>
        <input type="text" name="lead_org_converted_person_name" class="form-control form-control-sm" value="<?php echo $lead->lead_org_converted_person_name; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Converted Person Email</label>
        <input type="text" name="lead_org_converted_email" class="form-control form-control-sm" value="<?php echo $lead->lead_org_converted_email; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Converted Person Phone</label>
        <input type="text" name="lead_org_converted_phone" class="form-control form-control-sm" value="<?php echo $lead->lead_org_converted_phone; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Converted Person Account</label>
        <input type="text" name="lead_org_converted_account" class="form-control form-control-sm" value="<?php echo $lead->lead_org_converted_account; ?>" />
    </div>
  </div>

  <div class="row mb-2">
  <div class="col">
        <label class="form-label">Lead ID</label>
        <input type="text" id="ix" class="form-control form-control-sm" value="<?php echo $lead->lead_id; ?>" disabled />
    </div>
    <div class="col">
        <label class="form-label">Lead Creation Time</label>
        <input type="text" class="form-control form-control-sm" value="<?php echo $lead->lead_creation_time; ?>" disabled />
    </div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
  </div>

  <p class="lead_info mt-4">&emsp;<i class="fas fa-exchange-alt"></i>&emsp;Modification Status</p>
  <div class="row mb-1">
    <div class="col">
        <label class="form-label">Lead Modify By</label>
        <input type="text" name="lead_modify_by" class="form-control form-control-sm" value="<?php echo $lead->lead_modify_by; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Lead Modify By ID</label>
        <input type="text" name="lead_modify_by_id" class="form-control form-control-sm" value="<?php echo $lead->lead_modify_by_id; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Lead Modification Time</label>
        <input type="text" name="lead_modify_time" class="form-control form-control-sm" value="<?php echo $lead->lead_modify_time; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Deal ID</label>
        <input type="text" name="lead_org_converted_deal_id" class="form-control form-control-sm" value="<?php echo $lead->lead_org_converted_deal_id; ?>" />
    </div>
    <div class="col">
        <label class="form-label">Last View</label>
        <input type="text" name="lead_org_last_view" class="form-control form-control-sm" value="<?php echo $lead->lead_org_last_view; ?>" />
    </div>
  </div>


  <div class="form-outline">
  <label class="form-label">Description</label>
    <textarea class="form-control" name="lead_org_des" rows="3" value="<?php echo $lead->lead_org_des; ?>"><?php echo $lead->lead_org_des; ?></textarea>
  </div>

</div>


<div class="container-fluid">
<input type="submit" name="u_update" class="btn btn-sm btn-success" value="Update" />
<a href="<?php echo site_url(); ?>leads/delete_lead/<?php echo $lead->lead_id; ?>" class="btn btn-sm btn-danger">Delete</a>
</div>



<?php echo form_close(); } ?>

<br>

<?php $this->load->view('dash/footer'); ?>