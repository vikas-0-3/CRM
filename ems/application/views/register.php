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
        <center><h4>Register</h4>
        <hr>
        <br>
        <?php echo form_open('home/registration_user'); ?>
            <div class="form-group row">
                <label for="inputText" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="u_name" class="form-control" id="inputText" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="u_email" class="form-control" id="inputEmail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-8">
                <input type="password" class="form-control input-sm" name="u_pass" placeholder="Password" required>
                </div>
            </div>

            <input type="submit" name="u_reg" value="Register" class="btn btn-success btn-sm">
        <?php echo form_close(); ?>
        </center>
        <hr>
        <p>Already a user ?&emsp;<a href="<?php echo site_url('home/login'); ?>">Login</a></p>
    
        
    </div>

    <?php $this->load->view('dash/footer'); ?>