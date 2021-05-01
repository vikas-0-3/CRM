<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$color_theme2 = "#778899";
$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
  foreach ($color_list->result() as $col)
  {
    $un = $col->user_id;
    $color1 = $col->color_1;
    $color_theme2 = $col->color_2;
  }
  $users_list = $this->db->get_where('users', array( 'u_email' =>  $_SESSION['id'] ));
  foreach ($users_list->result() as $user)
  {
    $a = $user->u_id;
  }

  // $query1 = $this->db->query('SELECT * FROM leads');
  $query1 = $this->db->get_where('leads', array( 'lead_org_id' => $a ));
  // $query2 = $this->db->query('SELECT * FROM task');
  $query2 = $this->db->get_where('task', array( 'task_oid' => $a ));


  $this->load->view('dash/header');
?>
<style>
    body {
        padding: 0;
    }
    #topcards {
        height: 400px;
    }
    .card {
        width: 20rem;
        margin: 10px;
        transition: transform .5s;
    }
    .card:hover {
        cursor: pointer;
        transform: scale(1.05);
    }
    .card h5 {
      text-align: center;
      color: <?php echo $color1; ?>;
    }
    .card-text {
      line-height: 5px;
    }
    .container {
        box-shadow: 0 0 10px 0 grey;
        background-color: white;
        position: absolute;
        left: 50%;
        top: 60%;
        transform: translate(-50%, -50%);
        height: 400px;
    }
    #baselinks {
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>
</head>
<body>

<div class="container-fluid" id="topcards">
<div class="row">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Leads</h5>
    <hr>
    <p class="card-text"><b>Total leads : </b> <?php echo $query1->num_rows(); ?></p>
    <p class="card-text"><b>Leads won: </b> 30</p>
    <p class="card-text"><b>Won percentage : </b> 60%</p>
    <hr>
    <a class="card-link">View Leads</a>
    <a class="card-link">Another link</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Deals</h5>
    <hr>
    <p class="card-text"><b>Total deals : </b> 50</p>
    <p class="card-text"><b>Deals converted: </b> 30</p>
    <p class="card-text"><b>Conversion percentage : </b> 60%</p>
    <hr>
    <a class="card-link">View Deals</a>
    <a class="card-link">Another link</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Todays tasks</h5>
    <hr>
    <p class="card-text"><b>Active tasks : </b> <?php echo $query2->num_rows(); ?></p>
    <p class="card-text"><b>Complete tasks : </b> 30</p>
    <p class="card-text"><b>Pending tasks : </b> 20</p>
    <hr>    
    <a class="card-link">View Tasks</a>
    <a class="card-link">Another link</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Statistics</h5>
    <hr>
    <p class="card-text"><b>Total sale : </b> 200</p>
    <p class="card-text"><b>Replacement: </b> 50</p>
    <p class="card-text"><b>Refund : </b> 10</p>
    <hr>    
    <a class="card-link">View Accounts</a>
    <a class="card-link">Manage Accounts</a>
  </div>
</div>

</div>

</div>


<!-- center container -->

<div class="container">
    <div class="row">
      <div class="col-sm" id="curve_chart" style="width:550px; height: 400px;"></div>
      <div class="col-sm" id="piechart"></div>
    </div>
</div>





<div class="container-fluid" id="baselinks">
  <div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">

    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Import</span></button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Export</span></button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1" data-toggle="modal" data-target="#exampleModal"><span style="font-size:10px;font-weight:bolder;">Theme</span></button>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Edit</span> </button>
    </div>
    <div class="btn-group dropup" role="group" aria-label="Basic example">
      <button class="btn btn-sm btn-light py-0 m-1 dropdown-toggle" type="button" data-toggle="dropdown"><span style="font-size:10px;font-weight:bolder;">Create</span></button>
        <div class="dropdown-menu" id="crtmenu">
            <a class="dropdown-item" href="<?php echo site_url(); ?>leads/create_lead_path/">Create Lead</a>
            <a class="dropdown-item" href="#">Create Product</a>
            <a class="dropdown-item" href="#">Create Contact</a>
            <a class="dropdown-item" href="#">Create Task</a>
        </div>
    </div>

  </div>
</div>





<?php $this->load->view('dash/theme_modal'); ?>








<!--google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Product', 'Sale per Month'],
  ['Laptops', 8],
  ['Mobiles', 2],
  ['CMS', 4],
  ['Graphics', 2],
  ['Assessories', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average sale', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>


<script>
    $(document).ready(function(){
        var bb = '<?php echo $color_theme2; ?>';
        $("#topcards, #baselinks").css("background-color",bb);
        
        $('#crtmenu a').bind("mouseover", function(){
            $(this).css("background-color", bb);
            $(this).css("color", 'white'); 

            $(this).bind("mouseout", function(){
              $(this).css("background", 'white');
              $(this).css("color", 'black');
            })   
        })
        
      });  
</script>

<?php $this->load->view('dash/footer'); ?>