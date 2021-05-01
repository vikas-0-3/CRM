<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $orgimg = "";
  $userimg = "";
  $users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user)
  {
    $a = $user->u_name;
    $org_id = $user->u_id;
    $user_org = $user->u_org;
    $renewal_date = $user->u_reg_date;
  }
  $org_img = $this->db->get_where('org_img', array( 'org_user_id' =>  $org_id ));
  foreach ($org_img->result() as $oimg)
  {
    $orgimg = $oimg->org_img;
  }

  $user_img = $this->db->get_where('user_img', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($user_img->result() as $uimg)
  {
    $userimg = $uimg->u_img;
  }

  $color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $color1 = $col->color_1;
    $color2 = $col->color_2;
  }
?>
<nav class="navbar navbar-expand navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <?php
    if($orgimg != null)
    {
      echo '<img src="data:image/jpeg;base64,'.base64_encode( $orgimg ).'" height="40" id="org_image" width="150" >';
    }
    else {
      echo '<img src="images/webx.png" height="40" width="150" >';
    }
    ?>
  </a>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item" id="navli">
      <p><b><?php echo strtoupper($user_org); ?> | RENEWABLE DATE </b>: <?php echo  date("Y-m-d", strtotime("+1 years", strtotime($renewal_date)));?></p>
      <p><b>FINANCIAL YEAR :</b> <?php echo $renewal_date. ' - <b>TO</b> - '.  date("Y-m-d", strtotime("+1 years", strtotime($renewal_date)));?></p>
      <p><b>USER:</b> <?php echo $a. ' ( '.$org_id.' ) '; ?></p>
      <p><b>LAST LOGIN:</b> WINNT <b>IP:</b> ::1 | <b>SESSION TIME :</b> <?php echo time(); ?></p>
      </li>&emsp;
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?php
          if($userimg != null)
          {
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg ).'" class="rounded-circle z-depth-0" alt="avatar image" height="40" width="45" >';
          }
          else {
            echo '<img src="images/def.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="40" width="45" >';
          }
        ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" id="crtmenu" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>select">Change Module</a>
          <!-- <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Theme</a> -->
          <a class="btn btn-sm btn-outline-dark mx-3" href="<?php echo site_url(); ?>home/logout">Log Out</a>
        </div>
      </li>
    </ul>
</nav>
