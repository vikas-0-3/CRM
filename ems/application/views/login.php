<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('dash/header'); ?>
    <title>EMS LOGIN</title>
    <style>
        .card {
            width: 30rem;
            padding: 15px;
            position: absolute;
            left: 50%; top: 40%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 3px 0 black;
        }
        body {
            background-image: url("https://img.freepik.com/free-photo/smooth-dark-blue-with-black-vignette-studio-well-use-as-background-business-report-digital-website-template_1258-748.jpg?size=626&ext=jpg");
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
  </head>
  <body>



    <div class="card">
        <center><h4>Login</h4>
        <hr>
        <br>
        <?php echo form_open('home/login_user'); ?>
      
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="email" name="u_email" class="form-control" id="staticEmail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-8">
                <input type="password" name="u_pass" class="form-control" id="inputPassword" placeholder="Password" required>
                </div>
            </div>

            <input type="submit" name="u_login" value="Login" class="btn btn-success btn-sm">
            <?php echo form_close(); ?>
        </center>

        <hr>
        <p>New around here ?&emsp;<a href="<?php echo site_url('home/register'); ?>">Register</a></p>
    
        
    </div>

    <?php $this->load->view('dash/footer'); ?>