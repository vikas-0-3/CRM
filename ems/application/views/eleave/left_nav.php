<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
foreach ($users_list->result() as $user){}
?>

       <!-- Left Nav -->
       <div class="nav" id="mynav">
        <nav>
            <a href="<?php echo site_url(); ?>eleave"><li><i class="fas fa-th-large"></i></li></a>
            <?php if($user->u_type == "a"){ ?><a href="<?php echo site_url(); ?>eleave/manage_leave" target="leave_frame"><li><i class="fas fa-ellipsis-h"></i></li></a><?php } ?>
            <a href="<?php echo site_url(); ?>eleave/apply_leave" target="leave_frame"><li><i class="fa fa-share-square"></i></li></a>
            <a href="<?php echo site_url(); ?>eleave/my_history" target="leave_frame"><li><i class="fa fa-history"></i></li></a>
            <?php if($user->u_type == "a"){ ?><a href="#" target="leave_frame"><li><i class="fa fa-cog"></i></li></a><?php } ?>  
          </nav>
    </div>

<div class="nav" id="mynav2">
    <nav>
        <a href="<?php echo site_url(); ?>eleave"><li>Dashboard</li></a>
        <?php if($user->u_type == "a"){ ?><a href="<?php echo site_url(); ?>eleave/manage_leave" target="leave_frame"><li>Manage Leave</li></a> <?php } ?>
        <a href="<?php echo site_url(); ?>eleave/apply_leave" target="leave_frame"><li>Apply Leave</li></a>
        <a href="<?php echo site_url(); ?>eleave/my_history" target="leave_frame"><li>My History</li></a>
        <?php if($user->u_type == "a"){ ?><a href="#" target="leave_frame"><li>Settings</li></a><?php } ?>
    </nav>
</div>
<div id="mybtn2">
    <div></div>
    <div></div>
    <div></div>
</div>
<button type="submit" class="btn btn-sm px-3 py-3" id="mybtn">&#8249;</button>


