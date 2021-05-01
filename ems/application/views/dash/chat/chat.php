<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $color1 = $col->color_1;
    $color2 = $col->color_2;
  }

$user_org = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($user_org->result() as $uorg)
  {
    $userorg = $uorg->u_org;
    $username = $uorg->u_name;
    $userorgid = $uorg->u_id;
    $userimg = $uorg->user_img;
  }
?>


<?php $this->load->view('dash/header'); ?>
<style>
    body {
      padding: 5px;
    }
    #scrolldiv {
        width: 100%;
        height: 85vh;
        overflow: auto;
        padding-left: 10px;
        padding-right: 10px;
        float: right;
        border-left: 1px solid <?php echo $color1; ?>;
    }

    .scrollbar-lady-lips::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5; 
    }

    .scrollbar-lady-lips::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-image: -webkit-gradient(linear, left bottom, left top, from(<?php echo $color1; ?>), to(<?php echo $color2; ?>));
    }
    .orgname h1 {
        background: -webkit-linear-gradient(<?php echo $color1; ?>, <?php echo $color2; ?>);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .card1, .card2 {
        border: 1px solid <?php echo $color1; ?>;
        border-radius:100px;
        width: 70%;
        margin: 15px;
        font-size: 10px; 
        padding-top: 10px;
        padding-left: 20px;
        text-align: left;
        background-color: white;
        font-size: 15px;
        
    }
    .card1 {

        float : left;
        box-shadow: 25px 0 15px -15px <?php echo $color2; ?>;
    }
    .card2 {
        float: right;
        box-shadow: -25px 0 15px -15px <?php echo $color2; ?>;
    }

    #leftchat {
      padding: 10px;
      text-align: left;
      height: 80vh;
      overflow: auto;
    }

    .chip {
      padding: 0 25px;
      font-size: 16px;
      border-radius: 25px;
      background-color: #f1f1f1;
      margin-top: 10px;
      color: black;
      height: 50px;
    }
    .chip img {
      float: left;
      margin: 0 10px 0 -25px;
      height: 50px;
      width: 50px;
      border-radius: 50%;
    }
/*right side chat */
.container {
  width: 75%;
  background-color: #F8F8F8;
  border-radius: 5px;
  border: 7px;
  border-left-style: solid;
  border-left-color: <?php echo $color2; ?>;
  padding: 10px;
  margin: 10px 0;
  float: left;
  text-align: left;
}

/* Darker chat container */
.darker {
  text-align: right;
  width: 75%;
  border-left-color: <?php echo $color1; ?>;
  background-color: #ddd;
  float: right;
}



#second_user {
  float: left;
  width: 60px;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  width: 60px;
  height: 60px;
  margin-left: 20px;
  margin-right:0;
  border-radius: 50%;
}

/* Style time text */
.time-right {
  float: right;
  color: <?php echo $color1; ?>;
}

/* Style time text */
.time-left {
  float: left;
  color: <?php echo $color1; ?>;
}
#mytextimage {
  text-align:center;
}
#mytextimage img.img-thumbnail {
  height: 200px;
  max-width: 200px;
  width: 100%;
  margin: 5px;
}
.dot {
  height: 8px;
  width: 8px;
  background-color: <?php echo $color1; ?>;
  border-radius: 50%;
  display: inline-block;
}
.small_text {
  float: right;
  font-size: 9px;
  color: <?php echo $color1; ?>;
}

</style>
</head>

<body>


<div class="orgname">
<center><h1 class="text"><?php echo $userorg; ?> chat</h1></center>
</div>

<center>
<div class="container-fluid">
<div class="row">


  <div class="col-3">
  <input type="text" class="form-control form-control-sm" onkeyup="chat_search()" id="chatting_input__search" placeholder="Search">

    <div class=" scrollbar scrollbar-lady-lips"  id="leftchat">
    
        <?php

          $user_details = $this->db->get_where('users', array( 'u_id' => $userorgid ));
          foreach($user_details->result() as $ud)
          { ?>
            <div class="chip">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ud->user_img ).'" class="rounded-circle" alt="user image" >'; ?>
            <span class="username"><?php echo $ud->u_name; ?></span><br>
      <?php if($ud->online == "yes")
            { ?>
                <small class="small_text"><span class="dot"></span>&ensp;Online</small>
      <?php }
            else { ?>
                <small class="small_text"><b>Last seen : </b><?php echo $ud->last_seen; ?></small>
            <?php } ?>
            
            </div>
         <?php } ?>

    </div>
  </div>









  <div class="col-9">
  
  <center>
<div class="container-fluid scrollbar scrollbar-lady-lips" id="scrolldiv">
<p class="enc"><i class="fas fa-lock"></i>&emsp;Messages to this chat are end-to-end encrypted </p>
<br>



      <?php  
        $user_chat = $this->db->get_where('chat', array( 'u_id' => $userorgid ));
        foreach($user_chat->result() as $uc)
        {
          if($uc->u_email == $_SESSION['id'])
          {
            if($uc->msg_image == "") { 
      ?>
               <div class="container darker">
               <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg ).'" class="right mx-2 my-2" alt="user image">'; ?>
                <p class="px-2"><?php echo $uc->msg; ?></p>
                <span class="time-left px-2">
                  <?php                           
                      $temp=strtotime($uc->msg_time);
                      $hour=date('H',$temp);
                      $minute=date('i',$temp);
                      echo $hour.":".$minute;  
                    ?>
                </span>
              </div>

         <?php
              }
              else if($uc->msg == "") {?>

              <div class="container darker">
               <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg ).'"  class="right mx-2 my-2" alt="user image">'; ?>

               <p id="mytextimage"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $uc->msg_image ).'" class="img-thumbnail" alt="image">'?> </p>

                <span class="time-left px-2">
                  <?php                           
                      $temp=strtotime($uc->msg_time);
                      $hour=date('H',$temp);
                      $minute=date('i',$temp);
                      echo $hour.":".$minute;  
                    ?>
                </span>
              </div>

        <?php }
              else {?>
              <div class="container darker">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg ).'"  class="right mx-2 my-2" alt="user image">'; ?>
                <p class="px-2"><?php echo $uc->msg; ?></p>
                <p id="mytextimage"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $uc->msg_image ).'" class="img-thumbnail" alt="image">'?> </p>
                
                <span class="time-left px-2">
                  <?php                           
                      $temp=strtotime($uc->msg_time);
                      $hour=date('H',$temp);
                      $minute=date('i',$temp);
                      echo $hour.":".$minute;  
                    ?>
                </span>
              </div>

        <?php } 
        }

        else{
          if($uc->msg_image == "") { ?>

            <div class="container">
                <?php
                  $user_img2 = $this->db->get_where('users', array( 'u_email' =>  $uc->u_email ));
                  foreach ($user_img2->result() as $uimg2)
                  {
                    $userimg2 = $uimg2->user_img;
                  }
                  echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg2 ).'" id="second_user" class="rounded-circle mx-2 my-2" title="'.$uimg2->u_email.'" alt="user image">';
                ?>
              <p class="px-2"><?php echo $uc->msg; ?></p>
              <span class="time-right px-2">
                    <?php                           
                      $temp=strtotime($uc->msg_time);
                      $hour=date('H',$temp);
                      $minute=date('i',$temp);
                      echo $hour.":".$minute;  
                    ?>
              </span>
            </div>

          
    <?php }
          else if($uc->msg == "") { 
    ?>

      <div class="container">
          <?php
            $user_img2 = $this->db->get_where('users', array( 'u_email' =>  $uc->u_email ));
            foreach ($user_img2->result() as $uimg2)
            {
              $userimg2 = $uimg2->user_img;
            }
              echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg2 ).'" id="second_user" title="'.$uimg2->u_email.'" class="rounded-circle mx-2 my-2" alt="user image">';
          ?>

          <p id="mytextimage"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $uc->msg_image ).'" class="img-thumbnail" alt="image">'?></p>
        <span class="time-right px-2">
            <?php                           
              $temp=strtotime($uc->msg_time);
              $hour=date('H',$temp);
              $minute=date('i',$temp);
              echo $hour.":".$minute;  
            ?>
        </span>
      </div>

    <?php } 
          else { 
    ?>
            <div class="container">
            <?php
              $user_img2 = $this->db->get_where('users', array( 'u_email' =>  $uc->u_email ));
              foreach ($user_img2->result() as $uimg2)
              {
                $userimg2 = $uimg2->user_img;
              }
              echo '<img src="data:image/jpeg;base64,'.base64_encode( $userimg2 ).'" id="second_user" title="'.$uimg2->u_email.'" class="rounded-circle mx-2 my-2" alt="user image">';
            ?>
              <p class="px-2"><?php echo $uc->msg; ?></p>
              <p id="mytextimage"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $uc->msg_image ).'" class="img-thumbnail" alt="image" >'?> </p>
              <span class="time-right  px-2">
              <?php                           
                $temp=strtotime($uc->msg_time);
                $hour=date('H',$temp);
                $minute=date('i',$temp);
                echo $hour.":".$minute;  
              ?>
              </span>
            </div>
          
    <?php }
            
        }
      } 
  ?>








    </div>




</div>
</center>
  
  </div>


</div>
</div>

</center>



<div class="container-sm col-3 mt-1" style="float: left;">
  <div class="text-right">  
    <div class="btn-group dropup">
      <button type="button" class="btn btn-sm btn-outline-dark px-4 mt-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-paperclip" style="color:<?php echo$color2; ?>;"></i></button>
      <div class="dropdown-menu">
        <li><a class="dropdown-item" href="#"><i class="fas fa-microphone-alt" style="color:orange;"></i>&emsp; Audio</a></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-video" style="color:orangered;"></i>&emsp; Video</a></li> 
        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-images" style="color:blue;"></i>&emsp; Image</a></li>
        <li><a class="dropdown-item" href="#" onclick="getLocation()"><i class="fas fa-map-marker-alt" style="color:green;"></i>&emsp; Location</a></li>
      </div>
    </div>
  </div>
</div>




<?php echo form_open('chat/send_msg/'.$userorgid); ?>
<div class="container-sm col-9 mt-1" style="float: right;">
<div class="input-group">
  <input type="text" class="form-control form-control-sm" name="user_msg" placeholder="Your text here ..." id="my_input_msg" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <input class="btn btn-sm btn-outline-dark py-2 px-3 mt-0"  type="submit" name="user_msg_send" id="button-addon2" value="Send" />
  </div>
</div>
</div>

<?php echo form_close(); ?>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Select Image</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('chat/send_media_msg/'.$userorgid); ?>
        <div class="modal-body">
          <label for="formFileSm" class="form-label">Select Image File</label>
          <input class="form-control-file form-control-sm" name="media_file" id="formFileSm" type="file" />   
          <br>
          <input class="form-control form-control-sm" type="text" name="image_des" placeholder="Your text here"> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <input type="submit" name="media_send" class="btn btn-primary btn-sm" value="Submit">
        </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div>




<script>
var x = document.getElementById("my_input_msg");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.ivalue = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.value = "Latitude: " + position.coords.latitude + 
  "    "+"Longitude: " + position.coords.longitude;
}

var targetDiv = document.getElementById('scrolldiv');
targetDiv.scrollTop = targetDiv.scrollHeight;

</script>



<script>
function chat_search() {
  var myinput, inp_val;

  myinput = document.getElementById("chatting_input__search").value.toUpperCase();

  inp_val = document.getElementsByClassName("username");

  for (var i = 0; i < inp_val.length; i++) {

      if (inp_val[i].innerHTML.toUpperCase() == myinput) {
        inp_val[i].parentElement.style.display = "block";
      } else {
        inp_val[i].parentElement.style.display = "none";
      }
  }    
}

</script>

<?php $this->load->view('dash/footer'); ?>