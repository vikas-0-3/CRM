<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

<!-- SELECT * FROM `task` WHERE Month(task_creation_time) = Month(CURDATE()) -->

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Calander</title>

    <style>
        .col-sm-4, .col-sm-7 {
            box-shadow: 0 0 3px grey;
        }
        #main_con {
            background-color: rgb(235, 235, 232);
        }
        .col-sm-2 {
            background-color: <?php echo $color2; ?>;
            color: white;
            text-align: center;
            border-bottom-left-radius: 15px;
            border-top-left-radius: 15px;
        }
        .col-sm-10 {
            background-color: white;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        /* #colordiv {
            background-color: white;

            border-left: 3px solid rgb(235, 235, 232);
        }
        #colordiv li {
            list-style: none;
        } */
        #date h1 {
            font-size: 500%;
            font-weight: 900;
        }
        #year {
            font-size: 200%;
            font-weight: 500;
        }
        .btn-group .btn {
            background-color: white;
            border: 3px solid white;
        }
        .btn-group .btn:hover {
            border-bottom: 3px solid <?php echo $color1; ?>;
        }
        #year_left, #year_right {
            background-color: <?php echo $color2; ?>;
            color: white;
            border-radius: 5px;
        }
        #btn_1to7 span,
        #btn_8to14 span,
        #btn_15to21 span,
        #btn_22to28 span,
        #btn_29to31 span {
            display: none;
        }
    </style>
  </head>
  <body>



    <div class="container-fluid p-2" id="main_con">

        <h3 class="text-center">Calendar</h3>
        <div class="container-fluid p-2">
            <div class="row mx-2">
                <div class="col-sm-2">
                    <div class="row-sm">
                        <div id="date">
                            <h1 id="cdate">1</h1>
                            <h5 id="calday"></h5>
                        </div>
                    </div><hr>
                    <p><input type="radio" id="month_wise" name="mnth_name" checked>
                        <label for="month_wise">Month</label>
                        <input type="radio" id="week_wise" name="mnth_name" />
                        <label for="week_wise">Week</label>  
                        <input type="radio" id="day_wise" name="mnth_name" />
                        <label for="day_wise">Day</label>
                    </p>
                    <hr>
                    <p class="text-center">
                        <span style="color: red;">&#9635;</span> Activity&ensp;
                        <span style="color: blue;">&#9635;</span> Tasks
                    </p>
                    <p>
                        <span style="color: green;">&#9635;</span> Emails&ensp;
                        <span style="color: orange;">&#9635;</span> Calls
                    </p>
                    <hr>
                    <div class="row-sm my-2 text-left">
                        <h6 class="text-center"><b>TODAY'S ACTIVITY</b></h6>
                        <?php  
                            $activity_list = $this->db->get_where('task', array( 'task_oid' => $a ));
                            foreach($activity_list->result() as $al)
                            {
                             echo "<li>".$al->task_name; "</li>";
                            } 
                        ?>

                    </div>
                    <br>
                    <div class="row-sm my-2">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Create an event ...">
                            <div class="input-group-append">
                              <button class="btn btn-sm " type="button"><b>+</b></button>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="col-sm-10" >
                    <p class="text-right m-2" id="year"> 
                    <button type="button" id="year_left" class="btn mx-1 p-2"> <b><</b> </button>
                     &emsp; 2021 &emsp;
                     <button type="button" id="year_right" class="btn mx-1 p-2"> <b>></b> </button> </p>
                    
                    <center>
                    <div class="btn-group">
                        <button type="button" id="m_left" class="btn mx-1 p-2"> <b><</b> </button>
                        <button type="button" id="m1" class="btn mx-1 p-2">Jan</button>
                        <button type="button" id="m2" class="btn mx-1 p-2">Feb</button>
                        <button type="button" id="m3" class="btn mx-1 p-2">Mar</button>
                        <button type="button" id="m4" class="btn mx-1 p-2">Apr</button>
                        <button type="button" id="m5" class="btn mx-1 p-2">May</button>
                        <button type="button" id="m6" class="btn mx-1 p-2">Jun</button>
                        <button type="button" id="m7" class="btn mx-1 p-2">Jul</button>
                        <button type="button" id="m8" class="btn mx-1 p-2">Aug</button>
                        <button type="button" id="m9" class="btn mx-1 p-2">Sep</button>
                        <button type="button" id="m10" class="btn mx-1 p-2">Oct</button>
                        <button type="button" id="m11" class="btn mx-1 p-2">Nov</button>
                        <button type="button" id="m12" class="btn mx-1 p-2">Dec</button>
                        <button type="button" id="m_right" class="btn mx-1 p-2"> <b>></b> </button>
                    </div>
                    <hr>
                    <div class="container row">
                        <button type="button" id="wd1" class="btn col m-1">Mon</button>
                        <button type="button" id="wd2" class="btn col m-1">Tue</button>
                        <button type="button" id="wd3" class="btn col m-1">Wed</button>
                        <button type="button" id="wd4" class="btn col m-1">Thu</button>
                        <button type="button" id="wd5" class="btn col m-1">Fri</button>
                        <button type="button" id="wd6" class="btn col m-1">Sat</button>
                        <button type="button" id="wd0" class="btn col m-1">Sun</button>
                    </div>
                    <hr><br>
                    <div class="container row" id="btn_1to7">
                        <button type="button" id="d1" class="btn col mx-1 py-2">01<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d2" class="btn col mx-1 py-2">02<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d3" class="btn col mx-1 py-2">03<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d4" class="btn col mx-1 py-2">04<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d5" class="btn col mx-1 py-2">05<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d6" class="btn col mx-1 py-2">06<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d7" class="btn col mx-1 py-2">07<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                    </div>
                    <div class="container row my-2" id="btn_8to14">
                        <button type="button" id="d8" class="btn col mx-1 py-2">08<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d9" class="btn col mx-1 py-2">09<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d10" class="btn col mx-1 py-2">10<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d11" class="btn col mx-1 py-2">11<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d12" class="btn col mx-1 py-2">12<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d13" class="btn col mx-1 py-2">13<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d14" class="btn col mx-1 py-2">14<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                    </div>
                    <div class="container row my-2" id="btn_15to21">
                        <button type="button" id="d15" class="btn col mx-1 py-2">15<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d16" class="btn col mx-1 py-2">16<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d17" class="btn col mx-1 py-2">17<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d18" class="btn col mx-1 py-2">18<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d19" class="btn col mx-1 py-2">19<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d20" class="btn col mx-1 py-2">20<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d21" class="btn col mx-1 py-2">21<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                    </div>
                    <div class="container row my-2" id="btn_22to28">
                        <button type="button" id="d22" class="btn col mx-1 py-2">22<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d23" class="btn col mx-1 py-2">23<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d24" class="btn col mx-1 py-2">24<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d25" class="btn col mx-1 py-2">25<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d26" class="btn col mx-1 py-2">26<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d27" class="btn col mx-1 py-2">27<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d28" class="btn col mx-1 py-2">28<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                    </div>
                    <div class="container row my-2" id="btn_29to31">
                        <button type="button" id="d29" class="btn col mx-1 py-2">29<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d30" class="btn col mx-1 py-2">30<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d31" class="btn col mx-1 py-2">31<br>
                        <span style="color: red;">&#9635;</span>
                        <span style="color: blue;">&#9635;</span>
                        <span style="color: green;">&#9635;</span>
                        <span style="color: orange;">&#9635;</span>
                        </button>
                        <button type="button" id="d32" class="btn col mx-1 py-2" disabled>01</button>
                        <button type="button" id="d33" class="btn col mx-1 py-2" disabled>02</button>
                        <button type="button" id="d34" class="btn col mx-1 py-2" disabled>03</button>
                        <button type="button" id="d35" class="btn col mx-1 py-2" disabled>04</button>
                    </div>
                    </center>
                    <br>
                </div>


            </div>
        </div>
    </div>


    <script>
        var d = new Date();
        var n = d.getMonth();
        var day = d.getDay();
        var cd = d.getDate();
        var y = d.getUTCFullYear();
        var firstday = new Date(y, n, 1).getDay();
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        func1(firstday);
        

            // changing background color of current month
        document.getElementById("m"+(n+1)).style.backgroundColor = "<?php echo $color2; ?>"; 
        document.getElementById("m"+(n+1)).style.color = "white";

            // changing border color of current date
        document.getElementById("d"+cd).style.borderBottom = "3px solid <?php echo $color2; ?>";

            // changing current day name and currenr day
        document.getElementById("cdate").innerHTML = cd;
        document.getElementById("calday").innerHTML = days[day];
        

        //function to check for days name and change weekdays accordingly
        
        function func1(aaa) {
            if(aaa == 0) { // if firstday of the month is sunday
                document.getElementById("wd1").innerHTML = "Sun";
                document.getElementById("wd2").innerHTML = "Mon";
                document.getElementById("wd3").innerHTML = "Tue";
                document.getElementById("wd4").innerHTML = "Wed";
                document.getElementById("wd5").innerHTML = "Thu";
                document.getElementById("wd6").innerHTML = "Fri";
                document.getElementById("wd0").innerHTML = "Sat";

            }
            else if (aaa == 1) { // if firstday of the month is Monday
                document.getElementById("wd1").innerHTML = "Mon";
                document.getElementById("wd2").innerHTML = "Tue";
                document.getElementById("wd3").innerHTML = "Wed";
                document.getElementById("wd4").innerHTML = "Thu";
                document.getElementById("wd5").innerHTML = "Fri";
                document.getElementById("wd6").innerHTML = "Sat";
                document.getElementById("wd0").innerHTML = "Sun";
            }
            else if (aaa == 2) { // if firstday of the month is Tuesday
                document.getElementById("wd1").innerHTML = "Tue";
                document.getElementById("wd2").innerHTML = "Wed";
                document.getElementById("wd3").innerHTML = "Thu";
                document.getElementById("wd4").innerHTML = "Fri";
                document.getElementById("wd5").innerHTML = "Sat";
                document.getElementById("wd6").innerHTML = "Sun";
                document.getElementById("wd0").innerHTML = "Mon";

            }
            else if (aaa == 3) { // if firstday of the month is Wednesday
                document.getElementById("wd1").innerHTML = "Wed";
                document.getElementById("wd2").innerHTML = "Thu";
                document.getElementById("wd3").innerHTML = "Fri";
                document.getElementById("wd4").innerHTML = "Sat";
                document.getElementById("wd5").innerHTML = "Sun";
                document.getElementById("wd6").innerHTML = "Mon";
                document.getElementById("wd0").innerHTML = "Tue";

            }
            else if (aaa == 4) { // if firstday of the month is Thursday
                document.getElementById("wd1").innerHTML = "Thu";
                document.getElementById("wd2").innerHTML = "Fri";
                document.getElementById("wd3").innerHTML = "Sat";
                document.getElementById("wd4").innerHTML = "Sun";
                document.getElementById("wd5").innerHTML = "Mon";
                document.getElementById("wd6").innerHTML = "Tue";
                document.getElementById("wd0").innerHTML = "Wed";

            }
            else if (aaa == 5) { // if firstday of the month is friday
                document.getElementById("wd1").innerHTML = "Fri";
                document.getElementById("wd2").innerHTML = "Sat";
                document.getElementById("wd3").innerHTML = "Sun";
                document.getElementById("wd4").innerHTML = "Mon";
                document.getElementById("wd5").innerHTML = "Tue";
                document.getElementById("wd6").innerHTML = "Wed";
                document.getElementById("wd0").innerHTML = "Thu";

            }
            else if (aaa == 6) { // if firstday of the month is Saturday
                document.getElementById("wd1").innerHTML = "Sat";
                document.getElementById("wd2").innerHTML = "Sun";
                document.getElementById("wd3").innerHTML = "Mon";
                document.getElementById("wd4").innerHTML = "Tue";
                document.getElementById("wd5").innerHTML = "Wed";
                document.getElementById("wd6").innerHTML = "Thu";
                document.getElementById("wd0").innerHTML = "Fri";

            }
            else{
                //do nothing
            }
        }
        //function over
     

    // fetching data for task from the database
    var arr=[];
    <?php
          $task_list = $this->db->get_where('task', array( 'Month(task_creation_time)' => date('m') ));
          foreach ($task_list->result() as $tl)
          {
            $d=strtotime($tl->task_creation_time);?>
            arr.push(<?php echo date("d", $d); ?>); // pushing data into javascript array
            <?php
          } 
    ?>
    for(var i=0; i<arr.length; i++){
        var c = document.getElementById("d"+arr[i]).childNodes;
        c[5].style.display="inline"; // c[5] is for task 
    }


    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>