<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
foreach ($users_list->result() as $user)
{
  $a = $user->u_org;
}

$color1 = "";
$color2 = "";
$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $color1 = $col->color_1;
    $color2 = $col->color_2;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap  -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title><?php echo $a; ?> Modules</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <style>
      .container-md {
        background-color: <?php echo $color1; ?>;
        position: absolute;
        top: 25%;
        left: 3%;
        height: 500px;
        width: 700px;
        display: flex;
        justify-content: space-around;
        padding-top: 5px;
/*        opacity: 0;*/
      }
      .concards {
        margin: 5px;
        background-color: white;
        height: 155px;
        width: 335px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px #FCD0B4;
        text-align: center;
        cursor: pointer;  
        transition: transform .2s;   
      }
      .concards p:hover {
        transform: scale(1.2);
      }

      .concards p {
        color: <?php echo $color2; ?>;
        font-size: 23px;
      }
    </style>
  </head>
  <body style="background-color:#EDF2F5">

<nav class="navbar-light bg-light" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <img src="images/3d-model.png" width="50" height="30" style="margin-left:20px;margin-top:-10px" >
  <span class="navbar-brand mb-0 h1" style="font-size:30px;margin-left:5px">Modules</span>
</nav>

<div class="container" style="text-align: center;" >
  <br>
  <h1 class="h2" >Welcome To <span style="color:<?php echo $color1; ?>;"><?php echo $a; ?></span> </h1>
  <p class="h5">Select your Modules</p>
</div>
<br>
<br><br>

<div class="container-md">
  <div class="con1">
  <?php if($user->mod1 == "yes"){ ?>
    <div class="concards" id="c1"><p>PROJECT MANAGEMENT</p></div>
  <?php } ?>
  <?php if($user->mod2 == "yes"){ ?>
    <div class="concards" id="c2"><p>Accounting</p></div>
  <?php } ?>
  <?php if($user->mod3 == "yes"){ ?>
    <div class="concards" id="c3"><p>HRMS</p></div>
  <?php } ?>
  </div>
  <div class="con2">
  <?php if($user->mod4 == "yes"){ ?>
    <div class="concards" id="c4"><p>E-CLAIM</p></div>
  <?php } ?>
  <?php if($user->mod5 == "yes"){ ?>
    <div class="concards" id="c5"><p>E_LEAVE</p></div>
  <?php } ?>
  <?php if($user->mod6 == "yes"){ ?>
    <div class="concards" id="c6"><p>CRM</p></div>
  <?php } ?>
  </div>
</div>

    <div class="container" style="margin-top:-50px;">
      <img src="images/man.svg"  class="img-fluid" alt="Responsive image" style="float:right;height:450px;">
    </div>

    <script>
      $(document).ready(function(){
        $("#c1").on("click",function(){
          $(window).attr('location','dash_home.php');
        });
        $("#c2").on("click",function(){
          $(window).attr('location','#');
        });
        $("#c3").on("click",function(){
          $(window).attr('location','#');
        });
        $("#c4").on("click",function(){
          $(window).attr('location','#');
        });
        $("#c5").on("click",function(){
          $(window).attr('location','<?php echo site_url('eleave'); ?>');
        });
        $("#c6").on("click",function(){
          $(window).attr('location','<?php echo site_url('dash'); ?>');
        });
      });
    </script>
  </body>
</html>