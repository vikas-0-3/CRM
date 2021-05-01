<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('dash/header'); ?>
    <title>EMS SUPERADMIN</title>
    <style>
      #navli {
        line-height: 0.1px;
        font-size: 9px;
        text-align: right;
      }
</style>
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <img src="images/webx.png" class="m-0" height="40" width="150" >
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" id="navli"></li>&emsp;
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="images/def.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="40" width="45" >
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" id="crtmenu" aria-labelledby="navbarDropdownMenuLink-4">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="btn btn-sm btn-outline-dark mx-3" href="<?php echo site_url(); ?>home/logout">Log Out</a>
                </div>
            </li>
        </ul>
    </nav>


    <h1>SUPERADMIN</h1>




  <?php $this->load->view('dash/footer'); ?>