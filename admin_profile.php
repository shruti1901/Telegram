<?php
include_once 'db.php';
$query = "SELECT * FROM contestant"; 
$query1 = "SELECT * FROM feedback"; 

$result = mysql_query($query);
$result1 = mysql_query($query1);


$registered = "SELECT COUNT(*) FROM registration";
$feedback = "SELECT COUNT(*) FROM feedback";

$count = mysql_num_rows($result);
$count1 = mysql_num_rows($result1);

mysql_close();
?>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                          </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
      <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
  </div>
 </nav>   
               <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i>Create Contest</a>
                    </li>
	            <li>

                        <a class="active-menu"  href="index.html">
                            <i class="fa fa-dashboard fa-3x"></i> Result</a>
                    </li>
                     <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i>Upcoming Contest</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i>Conducted Contest</a>
                    </li>
						   <li  >
                        <a   href="feedback.html"><i class="fa fa-bar-chart-o fa-3x"></i> Feedback</a>
                    </li>	
				
                </ul>
               
            </div>        
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
  <div class="row">
  <div class="col-md-12">
                     <h2>Admin Profile</h2>   
 <?php
      session_start();
include("db.php");

if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not logged on...');</script>";
	header("refresh:0; url='contestant.php'");
}
else
{
	
	$username = $_SESSION['username'];
}
?>
                     <ul class="list-2"><h5>
                         <li class="text-1">Welcome Admin, <?php echo $username; ?>
                         </h5></li>																
															</ul>
               
                    </ul>
                    </div>
<body id="body" style="color:black;">
      <div id="content"> 
          
	  <br>
             <u>Total Summary</u>
			<br>
			 <h6>
			 Total Registered Users : 
			 <?php 
				echo "Total ".$count." students";
				echo "<br>";
				?>
							 Total Feedbacks : 
			 <?php
	echo "Total ".$count1." students";
	echo "<br>";
?>
			 </h6>
                <input type="submit" value="View Pending Requests" class="btn btn-danger square-btn-adjust" /> 
                            </div>
              
                </div>              
         
            </div>
        </div>
          
        </div>
      
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>



	</div>
</body>
</html>