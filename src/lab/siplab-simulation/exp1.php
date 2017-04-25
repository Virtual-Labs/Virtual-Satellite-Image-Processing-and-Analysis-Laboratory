<?php 
session_start();
if (!isset($_SESSION['email']))
header("Location: index.php");
$fname=$_SESSION['fname'];
$_SESSION['fname']=$fname;
$lname=$_SESSION['lname'];
$_SESSION['lname']=$lname;
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$folder=$_SESSION['folder'];
$_SESSION['fname']=$folder;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Virtual Labs</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


	<link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="../bower_components/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="build.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="mycss.css">



  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>



    
    <style type="text/css">
    	body 
    	{
    		padding-top: 90px;
    	
		}
		
    </style>	


    <style type="text/css">
    	
    	.menu
{
background-color: white;
border-bottom: 4px solid #04A3ED;
width:100%;
height: auto;
padding: 0;
position: fixed;
margin: 0px;
z-index: 1;
opacity: 0.9;
}

.menu  .navbar-nav > .active > a
{
background-color : #04A3ED;
color: white;
font-weight: bold;
}

.menu  .navbar-nav >  li >  a
{
font-size: 13px;
color: #297FAB;
padding: 10px 35px;

}

.navbar-header > a
{
font-family: 'Ubuntu Condensed', sans-serif;
padding: 0px;
margin: 0px;
text-decoration: none;
color: white;
font-size: 25px;
padding: 5px 30px;
}
.navbar-header > a:hover
{
text-decoration: none;
color: #04A3ED;
align-content: center;
}
</style>

</head>
<body>
	

	<div class="menu" style="margin-top: -7%">
	    <div class="container-fluid">
			<div class="navbar-header">
				<a href="#"><img src="IITB_VLAB_LOGO_60.png"></a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="change_password.php" ><span class="glyphicon glyphicon-user"></span> Change Password</a></li>
					<li><a href="signout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
			<div>
			</div>
		</div>
	</div>
	<?php 
	echo $fname;
	echo "<br>".$lname;
	echo "<br>".$email;
	echo "<br>user_data/".$folder;
	?>
	<div class="container">
    	<div class="row">
    	<h2 align="center">SBHS lab experiments</h2>
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				<ul class="event-list">
					<li>
						<time>
							<span class="day">1</span>
						</time>
						<div class="info">
						<a href="exp1/index.php"><h2 class="links">Experiment 1</h2> </a>
							<!--<p class="desc">United States Holiday</p> -->
						</div> 
					</li> 

					<li>
						<time>
							<span class="day">2</span>
						</time>
						<div class="info">
							<a href="exp2/index.php"> <h2 class="links">Experiment 2</h2> </a>
						</div>
					</li>

					<li>
						<time>
							<span class="day">3</span>
						</time>						
						<div class="info">
							<a href="exp3/index.php"> <h2 class="links">Experiment 3</h2> </a>
						</div>
					</li>

					<li>
						<time>
							<span class="day">4</span>
						</time>						
						<div class="info">
							<a href="exp4/index.php"> <h2 class="links">Experiment 4</h2> </a>
						</div>						
					</li>

					<li>
						<time>
							<span class="day">5</span>
						</time>						
						<div class="info">
							<a href="exp5/index.php"> <h2 class="links">Experiment 5</h2> </a>
						</div>						
					</li>
				</ul>
			</div>
		</div>
	</div>
    
    <div class="clearfix"></div>
</body>
</html>
