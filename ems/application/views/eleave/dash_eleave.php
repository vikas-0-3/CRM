
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user)
  {
    $a = $user->u_id;
    $b = $user->u_org;
  }
$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $color1 = $col->color_1;
    $color2 = $col->color_2;
  }
  $this->load->view('dash/header');
?>
    <title><?php echo strtoupper($b).' -'; ?> E-Leave</title>
    
    <style>
      #navli {
        line-height: 0.1px;
        font-size: 9px;
        text-align: right;
      }
      #mynav, #mynav2, #mybtn {
        background-color: <?php echo $color1; ?>;
      }
      #mynav, #mynav2 {
        color: rgb(184, 178, 178);
        font-size: 12px;
        height: 90%;
        position: absolute;
        top: 10%;
        padding-top: 15px;
      }
      #mynav {
        width: 3%;
        left: 0;
        justify-content: center;
      }
      #mynav2 {
        left: 3%;
        width: 7%;
      }
      #mynav li:hover {
        transform: scale(1.4);
      }
      #mynav li, #mynav2 li {
        padding-top: 10px;
        cursor: pointer;
        color: white;
      }

    #mybtn {
        position: absolute;
        left: 8.5%;
        top: 45%;
        z-index: 1;
        color: white;
        border-radius: 10px;
        border: 2px solid <?php echo $color2; ?>;
    }
    #mybtn2 {
        position: absolute;
        left: 12px;
        top: 11%;
        z-index: 1;
        display: none;
        cursor: pointer;
    }
    #mybtn2 div {
        width: 15px;
        height: 1px;
        background-color: white;
        margin: 3px;
    }
    #mynav2 nav a li:hover {
        color: <?php echo $color2; ?>;
    }
  
    #myiframe {
      width: 90%;
      height: 90%;
      position: absolute;
      left: 10%;
      top: 10%;
    }


    @media only screen and (max-width: 600px) {

      #org_image {
        margin-top: -60px;
      }

      #mynav2, #mybtn, #mybtn2{
        display: none;
      }
      #myiframe {
        width: 97%;
        position: absolute;
        left: 3%;
      }


    }
</style>
</head>
</body>
<?php $this->load->view('dash/nav'); ?>
<?php $this->load->view('eleave/left_nav'); ?>

<h1>lol</h1>





<iframe src="<?php echo site_url(); ?>eleave/def_dash" frameborder="0" id="myiframe" name="leave_frame"></iframe>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
    $(document).ready(function(){

        $("#mybtn").on("click", function(){
            $("#mybtn").hide();
            $("#mybtn2").show();
            $("#myiframe").css("width","97%");
            $("#myiframe").css("position","absolute");
            $("#myiframe").css("left","3%");
            $("#chat_btn").css("display","none");
            $("#chat_icon").css("display","block");

        });

        $("#mybtn2").on("click", function(){
            $("#mybtn").show();
            $("#mybtn2").hide();
            $("#myiframe").css("width","90%");
            $("#myiframe").css("position","absolute");
            $("#myiframe").css("left","10%");
            $("#chat_btn").css("display","block");
            $("#chat_icon").css("display","none");

        });


        $('#crtmenu a').bind("mouseover", function(){
            $(this).css("background-color", "<?php echo $color2; ?>");
            $(this).css("color", 'white');

            $(this).bind("mouseout", function(){
                $(this).css("background", 'white');
                $(this).css("color", 'black');
            })    
        })
      });  
</script>

<?php $this->load->view('dash/footer'); ?>