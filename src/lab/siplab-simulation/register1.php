<?php 
session_start();
error_reporting(0);
include 'connect.php';

if(isset($_POST['register-submit'])){
	// code for check server side validation
/*if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != '0')
	{  
		$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.		
	}
	else
	{ */ // Captcha verification is Correct. Final Code Execute here!		
	$name=$_POST['name'];
    //echo "<br>".$ncname;
    $designation=$_POST['designation'];
    //echo "<br>".$participant;
	$email=$_POST['email'];
    //echo "<br>".$email;
	$contact=$_POST['contact'];
    //echo "<br>".$contact;
    $institute=$_POST['institute'];
    //echo "<br>".$password;
    $proposal=$_POST['radioinline'];
    	
   		$sql="SELECT * FROM register WHERE email='$email' ";
      	$result=mysql_query($sql);
	    $counts=mysql_num_rows($result);

	    if (($counts)!=0)
	    {
	    	$row=mysql_fetch_array($result);
	    	$msgmail="Email already exists";
	    }
      	
      	else{

      	mkdir($email, 0777);

	  	$SQL = "INSERT INTO register(`name` ,`designation` ,`email` ,`contact` ,`institute` ,`proposal`) VALUES ('$name','$designation','$email','$contact','$institute','$proposal');";
		
    	$result = mysql_query($SQL);
        if (!$result) {
            die("ERROR: " . mysql_error() . "\n");
            echo '<script> alert("Not Registered."); </script>';
            echo "<script>window.open('index.php','_self')</script>";
        }
  
   
         //echo "Success";
        else
            {
                echo "<script>window.open('registered.php','_self')</script>";
            }

        }
    }
//}
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



  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>



    
    <style type="text/css">
    	body 
    	{
    		padding-top: 90px;
    		background-color: #00BCD4;
		}
		.panel-login {
		border-color: #ccc;
		-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		}
		.panel-login>.panel-heading {
		color: #00415d;
		background-color: #fff;
		border-color: #fff;
		text-align:center;
		}
		.panel-login>.panel-heading a{
			text-decoration: none;
			color: #666;
			font-weight: bold;
			font-size: 15px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login>.panel-heading a.active{
			color: #029f5b;
			font-size: 18px;
		}
		.panel-login>.panel-heading hr{
			margin-top: 10px;
			margin-bottom: 0px;
			clear: both;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
		}
		.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
			height: 45px;
			border: 0px;
			border-bottom: 1px solid #ddd;
			font-size: 16px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login input:hover,
		.panel-login input:focus {
			outline:none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-color: #ccc;
		}
		.btn-login {
			background-color: #59B2E0;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #59B2E6;
		}
		.btn-login:hover,
		.btn-login:focus {
			color: #fff;
			background-color: #53A3CD;
			border-color: #53A3CD;
		}
		.forgot-password {
			text-decoration: underline;
			color: #888;
		}
		.forgot-password:hover,
		.forgot-password:focus {
			text-decoration: underline;
			color: #666;
		}

		.btn-register {
			background-color: #1CB94E;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #1CB94A;
		}
		.btn-register:hover,
		.btn-register:focus {
			color: #fff;
			background-color: #1CA347;
			border-color: #1CA347;
		}
    </style>	


    <style type="text/css">
    	
    	.menu
{
background-color: white;
border-bottom: 4px solid #04A3ED;
width:100%;
height: auto;
padding: 0 10px;
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

    <script type="text/javascript">
	
	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
	
	</script>

	<!--<script type='text/javascript'>
		function refreshCaptcha()
		{
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script> -->
</head>
<body style="background: rgb(154,203,68)">
	

	<div class="menu" style="margin-top: -7%">
	    <div class="container-fluid">
			<div class="navbar-header">
				<a href="#"><img src="IITB_VLAB_LOGO_60.png"></a>
			</div>
			<div>
			</div>
		</div>
	</div>

	<div class="container">
    	<div class="row"> 
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<h3>Workshop Registration</h3>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="post" role="form" action="" method="POST" style="display: block;">

									<h5 style="color: red; text-align: right;">* All fields are compulsory</h5>
									<br>
									
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Your Name *" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="designation" id="designation" tabindex="1" class="form-control" placeholder="Designation *" value="" required>
									</div>

									<div class="form-group">
									<p style="color: red;"><?php echo $msgmail; ?></p>
									</div>

									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address *" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="contact" id="contact" tabindex="1" class="form-control" placeholder="10 digit Mobile Number *" onkeypress="return isNumber(event)" maxlength="10" value="" required>
									</div>
									 <script type="text/javascript">
										function isNumber(evt) {
										    evt = (evt) ? evt : window.event;
										    var charCode = (evt.which) ? evt.which : evt.keyCode;
										    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
										        return false;
										    }
										    return true;
										}						
										</script>
									
									<div class="form-group">
										<input type="text" name="institute" id="institute" tabindex="2" class="form-control" placeholder="Name of Institute *" required>
									</div>

									<div class="form-group">
										<p>Are you a new user *</p>
										<div class="radio radio-info radio-inline">
				                        <input type="radio" id="inlineRadio1" value="Yes" name="radioinline" required>
				                        <label for="inlineRadio1"> Yes </label>
				                    	</div>
				                    <div class="radio radio-info radio-inline">
				                        <input type="radio" id="inlineRadio2" value="No" name="radioinline">
				                        <label for="inlineRadio2"> No </label>
				                    </div>
									</div>
									
								<!--	<div class="form-group">
										<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
										    <?php if(isset($msg)){?>
										    <tr>
										      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
										    </tr>
										    <?php } ?>
										    <tr>
										      <td align="right" valign="top"> Validation code:</td>
										      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
										        <label for='message'>Enter the code above here :</label>
										        <br>
										        <input id="captcha_code" name="captcha_code" type="text">
										        <br>
										        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
										    </tr>
										  </table>
									</div>  -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now" style="background: rgb(0,188,212)">
											</div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
