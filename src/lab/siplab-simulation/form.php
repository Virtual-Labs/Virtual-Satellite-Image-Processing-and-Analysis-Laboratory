<?php 
    session_start();
    include 'connect.php';
    if(isset($_POST['submit']))
    {
        $ncid=$_SESSION['ncid'];
        $date=date('Y-m-d',strtotime($_POST['date']));

        function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $key;
            }
            $i= random_string(10);
            $r=$date."".$ncid."".$i;
            //echo "r= ".$r;


        for($i=0; $i < count($_POST['discipline']); $i++) 
        {
            $discipline = addslashes($_POST['discipline'][$i]);
            $labname = addslashes($_POST['labname'][$i]);
            $expname = addslashes($_POST['expname'][$i]);
            $ncid=$_SESSION['ncid'];
            $ncname=$_SESSION['ncname'];
            $participant=$_SESSION['participant'];
            $roll=$_SESSION['roll'];
            $fname=$_SESSION['fname'];
            $lname=$_SESSION['lname'];
            $contact=$_SESSION['contact'];
            $email=$_SESSION['email'];
            $branch=$_SESSION['branch'];
            //echo "<br>".$branch;
            $user=$_POST['user'];
            //echo "<br>".$user;
            $subject=$_POST['subject'];
            $date=date('Y-m-d',strtotime($_POST['date']));
            //echo "<br>".$date;
            $radio1=$_POST['radio1'];
            $radio2=$_POST['radio2'];
            $radio3=$_POST['radio3'];
            $radio4=$_POST['radio4'];
            $radio5=$_POST['radio5'];
            $radio7=$_POST['radio7'];
            $radio8=$_POST['radio8'];
            $radio9=$_POST['radio9'];
            $helpful=$_POST['helpful'];
            $specify=$_POST['specify'];
            $indicate=$_POST['indicate'];

            if (!empty($discipline) && !empty($labname) && !empty($expname))

            {
            
                $sql=mysql_query("INSERT INTO form(uid, ncid, ncname, participant, roll, fname, lname, contact, email, user, branch, subject, `date`, radio1, radio2, radio3, radio4, radio5, radio7, radio8, radio9, helpful, specify, indicate, discipline, labname, expname) VALUES('$r','$ncid','$ncname','$participant','$roll','$fname','$lname','$contact','$email','$user','$branch','$subject','$date','$radio1','$radio2','$radio3','$radio4','$radio5','$radio7','$radio8','$radio9','$helpful','$specify','$indicate','$discipline','$labname','$expname')");

                if($sql) {
                    //echo "<script>alert('Invoice created successfully!')</script>";
                    echo "<script>window.open('thankyou.php','_self')</script>";
                }
                else
                {
                    echo "<script>alert('Not Submitted!')</script>";
                }
            }
            else
            {
               // echo "<script>alert('Fill all fields!')</script>";
                //echo "<script>window.open('thankyou.php','_self')</script>";
            }

        }     
    }

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Vlabs Feedback Form</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


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
    	function displayDate() {
	    var now = new Date();

	    var day = ("0" + now.getDate()).slice(-2);
	    var month = ("0" + (now.getMonth() + 1)).slice(-2);
	    var today = now.getFullYear() + "-" + (month) + "-" + (day);

	    document.getElementById("tdate").value = today;
	}
    </script>
    
</head>

<body style="background-color: #00BCD4" onload="displayDate()">

	<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
	<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

	<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

	<!--Font Awesome (added because you use icons in your prepend/append)-->
	<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

	<!-- Inline CSS based on choices in "Settings" tab -->
	<style>
		.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}
	</style>

	<?php 
		if (!isset($_SESSION['email']))
		header("Location: index.php");
		$ncid=$_SESSION['ncid'];
		$ncname=$_SESSION['ncname'];
		$participant=$_SESSION['participant'];
		$roll=$_SESSION['roll'];
		$fname=$_SESSION['fname'];
		$lname=$_SESSION['lname'];
		$contact=$_SESSION['contact'];
		$email=$_SESSION['email'];
		$branch=$_SESSION['branch'];

		$_SESSION['ncid']=$ncid;
		$_SESSION['ncname']=$ncname;
		$_SESSION['participant']=$participant;
		$_SESSION['roll']=$roll;
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$lname;
		$_SESSION['contact']=$contact;
		$_SESSION['email']=$email;
		$_SESSION['branch']=$branch;
	?>


		<div class="menu">
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
		</div>
	</div>
		<br><br><br>
		<div class="col-md-12">
		
		<h2 class="page-title" align="center">Virtual Labs Feedback Form</h2>
		</div>
			
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-md-2">
								
							</div>
							<div class="col-md-10">
								<h4>Nodal Center - &nbsp;&nbsp; <?php echo $ncid; ?> &nbsp; <?php echo $ncname; ?></h4>
							</div>
						</div>	
					</div>
					<div class="panel-body">
						<form method="POST" class="form-horizontal" action="#" role="form" enctype="multipart/form-data" onsubmit="return validate()">
							
							<br>
							<div class="row">
								<div class="col-md-1">
									<label class="col-sm-1 control-label">Date</label>
								</div>
								<div class="col-sm-2">
									<div class="input-group">
								       <input type="date" id="tdate" name="date" readonly>
							       </div>
								</div>
								<div class="col-md-2">
									<label class="control-label">Current Semester</label>
								</div>
								<div class="col-sm-3">
									<select name="subject" id="subject" class="form-control" style="border:0px; border-bottom:1px solid;" required>
										<option value="" selected> Select Semester</option>
										<option value="Semester I">Semester I</option>
										<option value="Semester II">Semester II</option>
										<option value="Semester III">Semester III</option>
										<option value="Semester IV">Semester IV</option>
										<option value="Semester V">Semester V</option>
										<option value="Semester VI">Semester VI</option>
										<option value="Semester VII">Semester VII</option>
										<option value="Semester VIII">Semester VIII</option>
									</select>
								</div>

								<div class="col-md-1">
									<label class="col-sm-1 control-label">User</label>
								</div>
								<div class="col-md-3">
									<select name="user" id="user" class="form-control" style="border:0px; border-bottom:1px solid;" required>
										<option value="" selected> Select User</option>
										<option value="Workshop User">Workshop User</option>
										<option value="Individual User">Individual User</option>
									</select>
								</div>
							</div>
							<br>
							<br>
							<h5 style="color: red;"><b style="font-size: 18px; color: red;">*</b> All fields of first row are mandatory</h5>
							<div class="row">
								<table  class="table table-hover small-text" id="tb">
									<tr class="tr-header">
										<th style="text-align: center;">Discipline</th>
										<th style="text-align: center;">Lab Name</th>
										<th style="text-align: center;">Experiment Name</th>
										<th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span style="color: green;">Add More Rows</span></a></th>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected> Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>											
										<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td><input type="text" name="labname[]" class="form-control"></td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td><input type="text" name="labname[]" class="form-control"></td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
									<tr>
										<td>
											<select name="discipline[]" class="form-control" onChange="checkOption(this)" id="groups">
											<option value="" selected>Select Discipline</option>
											<option value="Electronics & Communications">Electronics & Communications</option>
											<option value="Computer Science & Engineering">Computer Science & Engineering</option>
											<option value="Electrical Engineering">Electrical Engineering</option>
											<option value="Mechanical Engineering">Mechanical Engineering</option>
											<option value="Chemical Engineering">Chemical Engineering</option>
											<option value="Biotechnology and Biomedical Engineering">Biotechnology and Biomedical Engineering</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Physical Sciences">Physical Sciences</option>
											<option value="Chemical Sciences">Chemical Sciences</option>
											</select>
										</td>
										<td>
											<input type="text" name="labname[]" class="form-control">
										</td>
										<td><input type="text" name="expname[]" class="form-control"></td>
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
								</table>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
								<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
								<script>
									$(function(){
									    $('#addMore').on('click', function() {
									              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
									              data.find("input").val('');
									     });
									     $(document).on('click', '.remove', function() {
									         var trIndex = $(this).closest("tr").index();
									            if(trIndex>10) {
									             $(this).closest("tr").remove();
									           } else {
									             alert("Can't remove first 10 rows!");
									           }
									      });
									});      
								</script>

								<script type="text/javascript">
									$(function(){
								    $('#groups').on('change', function(){
								        var val = $(this).val();
								        var sub = $('#sub_groups');
								        $('option', sub).filter(function(){
								            if (
								                 $(this).attr('data-group') === val 
								              || $(this).attr('data-group') === 'SHOW'
								            ) {
								                $(this).show();
								            } else {
								                $(this).hide();
								            }
								        });
								    });
								    $('#groups').trigger('change');
								});
								</script>

							</div>
							<br>
							<h4>Questionnaire</h4>
							<label>Please indicate your agreement with the following statements</label>
							<br>
							<br>
							<div class="row">
								<div class="col-md-5">
									<p style="margin-top: 2.5%;">The degree to which the actual lab environment is simulated <b style="font-size: 18px; color: red;"><b style="font-size: 18px; color: red;">*</b></b></p>
								</div>
								<div class="col-md-7">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio1" id="radio1" value="Excellent" required>
										<label for="radio1"> Excellent </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio1" id="radio2" value="Very Good">
										<label for="radio2"> Very Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio1" id="radio3" value="Good">
										<label for="radio3"> Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio1" id="radio4" value="Fair">
										<label for="radio4"> Fair </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio1" id="radio5" value="Poor">
										<label for="radio5"> Poor </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<p style="margin-top: 2.5%;">The manuals were to be found helpful <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-7">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio2" id="radio6" value="Excellent" required>
										<label for="radio6"> Excellent </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio2" id="radio7" value="Very Good">
										<label for="radio7"> Very Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio2" id="radio8" value="Good">
										<label for="radio8"> Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio2" id="radio9" value="Fair">
										<label for="radio9"> Fair </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio2" id="radio10" value="Poor">
										<label for="radio10"> Poor </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<p style="margin-top: 2.5%;">The results of experiment were easily interpretable <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-7">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio3" id="radio11" value="Excellent" required>
										<label for="radio11"> Excellent </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio3" id="radio12" value="Very Good">
										<label for="radio12"> Very Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio3" id="radio13" value="Good">
										<label for="radio13"> Good </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio3" id="radio14" value="Fair">
										<label for="radio14"> Fair </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio3" id="radio15" value="Poor">
										<label for="radio15"> Poor </label>
									</div>
								</div>
							</div>
							<br>
							<br>
							<label>Please tell your agreement with the following statements</label>
							<br>
							<br>
							<div class="row">
								<div class="col-md-8">
									<p style="margin-top: 2.5%;">Did you get the feeling of actual lab while performing the experiments <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-4">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio4" id="radio16" value="Yes" required>
										<label for="radio16"> Yes </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio4" id="radio17" value="No">
										<label for="radio17"> No </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<p style="margin-top: 2.5%;">Do you think performing experiments through Virtual Labs is more challenging than the real lab experiments <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-4">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio5" id="radio18" value="Yes" required>
										<label for="radio18"> Yes </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio5" id="radio19" value="No">
										<label for="radio19"> No </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<p style="margin-top: 2.5%;">Do you think performing experiments through Virtual Labs gives scope for more innovative and creative research work <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-4">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio7" id="radio20" value="Yes" required>
										<label for="radio20"> Yes </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio7" id="radio21" value="No">
										<label for="radio21"> No </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<p style="margin-top: 2.5%;">Did you go through the manual / step by step method before before performing the live experiments <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-4">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio8" id="radio22" value="Yes" required>
										<label for="radio22"> Yes </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio8" id="radio23" value="No">
										<label for="radio23"> No </label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<p style="margin-top: 2.5%;">Do you find the theory part useful <b style="font-size: 18px; color: red;">*</b></p>
								</div>
								<div class="col-md-4">
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio9" id="radio24" value="Yes" required>
										<label for="radio24"> Yes </label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" name="radio9" id="radio25" value="No">
										<label for="radio25"> No </label>
									</div>
								</div>
							</div>
							<br>
							<br>
							<div class="col-md-10">
							<label>How helpful is the system <b style="font-size: 18px; color: red;">*</b></label>
							</div>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" name="helpful" required></textarea>
							</div>
							<div class="col-md-10" style="margin-top: 5%;">
							<label>Specify the problems/difficulties you faced while performing the experiments <b style="font-size: 18px; color: red;">*</b></label>
							</div>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" name="specify" required></textarea>
							</div>
							<div class="col-md-10" style="margin-top: 5%;">
							<label>Indicate aspects you found interesting about the experiments <b style="font-size: 18px; color: red;">*</b></label>
							</div>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" name="indicate" required></textarea>
							</div>
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-4">
								<!--	<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#otp" style="margin-top: 5%;">Submit</button> -->
									<input type="submit" name="submit" style="margin-top: 5%;" id="submit" tabindex="4" class="btn btn-primary" value="Submit">
								</div>
							</div>
							<br>
							<br>
							<div class="hr-dashed"></div>
						</form>
					</div>
				</div>
			</div>
		</div>					
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</body>

</html>