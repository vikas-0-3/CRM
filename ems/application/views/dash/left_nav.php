<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
foreach ($users_list->result() as $user){}
?>


       <!-- Left Nav -->
       <div class="nav" id="mynav">
        <nav>
        <a href="<?php echo site_url('dash'); ?>"><li><i class="fas fa-handshake"></i></li></a>
        <a href="#" target="iframe_c"><li><i class="fas fa-handshake"></i></li></a>
            <a href="<?php echo site_url(); ?>dash/product" target="iframe_c"><li><i class="fas fa-handshake"></i></li></a>
            <a href="deal.php" target="iframe_c"><li><i class="fas fa-phone" id="i3"></i></li></a>
            <a href="opportunities.php" target="iframe_c"><li><i class="fa fa-cash-register"></i></li></a>
            <a href="<?php echo site_url(); ?>dash/leads" target="iframe_c"><li><i class="fa fa-users"></i></li></a>
            <?php if($user->u_type == "a"){ ?><a href="<?php echo site_url(); ?>dash/contact" target="iframe_c"><li><i class="fa fa-users"></i></li></a><?php } ?>
            <!--<a href="#" target="iframe_c"><li><i class="fa fa-bullseye" id="i8"></i></li></a>-->
            <?php if($user->u_type == "a"){ ?><a href="usermanage.html" target="iframe_c"><li><i class="fa fa-users"></i></li></a><?php } ?> 
            <a href="<?php echo site_url(); ?>dash/task" target="iframe_c"><li><i class="fa fa-users"></i></li></a>
            <a href="<?php echo site_url(); ?>dash/quotation" target="iframe_c"><li><i class="fa fa-bullseye"></i></li></a>
            <?php if($user->u_type == "a"){ ?><a href="colortheme.html" target="iframe_c"><li><i class="fa fa-bullseye"></i></li></a><?php } ?> 
            <a href="<?php echo site_url(); ?>dash/cal" target="iframe_c"><li><i class="fas fa-calendar-week"></i></li></a>
            <a href="<?php echo site_url(); ?>dash/chat" target="iframe_c" id="chat_icon"><li><i class="fas fa-comments"></i></li></a>        
          </nav>
    </div>

<div class="nav" id="mynav2">
    <nav>
    <a href="<?php echo site_url('dash'); ?>"><li>Dashboard</li></a>
    <a href="#" target="iframe_c"><li>Account</li></a>
        <a href="<?php echo site_url(); ?>dash/product" target="iframe_c"><li>Products</li></a>
        <a href="deal.php" target="iframe_c"><li>Deal</li></a>
        <a href="opportunities.php" target="iframe_c"><li>Opportunities</li></a>
        <a href="<?php echo site_url(); ?>dash/leads" target="iframe_c"><li>Leads</li></a>
        <?php if($user->u_type == "a"){ ?><a href="<?php echo site_url(); ?>dash/contact" target="iframe_c"><li>Contacts</li></a><?php } ?>
        <!--<a href="#" target="iframe_c"><li>Meetings</li></a>-->
        <?php if($user->u_type == "a"){ ?><a href="usermanage.html" target="iframe_c"><li>Manage User</li></a><?php } ?> 
        <a href="<?php echo site_url(); ?>dash/task" target="iframe_c"><li>Tasks</li></a>
        <a href="<?php echo site_url(); ?>dash/quotation" target="iframe_c"><li>Quotations</li></a>
        <?php if($user->u_type == "a"){ ?><a href="colortheme.html" target="iframe_c"><li>Settings</li></a><?php } ?> 
        <a href="<?php echo site_url(); ?>dash/cal" target="iframe_c"><li>Calander</li></a>

        <a href="<?php echo site_url(); ?>dash/chat" id="chat_btn" target="iframe_c"><img src="images/chat.png" id="chat"></a>
    </nav>
</div>
<div id="mybtn2">
    <div></div>
    <div></div>
    <div></div>
</div>
<button type="submit" class="btn btn-sm px-3 py-3" id="mybtn">&#8249;</button>


