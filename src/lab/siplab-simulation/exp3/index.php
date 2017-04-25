<?php 
session_start();
if (!isset($_SESSION['email']))
header("Location: ../index.php");

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/myjs.js"></script>
	<link rel="stylesheet" type="text/css" href="../mycss.css">

	<style type="text/css">
	/**
	 * Override feedback icon position
	 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
	 */
	#eventForm .form-control-feedback {
	    top: 0;
	    right: -15px;
	}
	</style>

	<style type="text/css">

	body 
    	{
    		padding-top: 90px;
    	
		}
    	
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

	<style type="text/css">
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .red{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
            function changeValue(dropdown) {
                var option = dropdown.options[dropdown.selectedIndex].value,
                field = document.getElementById('titre');

                if (option == 'Average') {
                    field.value = field.value.substr(0, 2); // before reducing the maxlength, make sure it contains at most two characters; you could also reset the value altogether
                    field.readOnly = true;
                    field.value=0;

                } else if (option == 'Circular') {
                	field.readOnly = true;
                	field1.value=0;
                }

                else if (option == 'Gaussian') {
                	field.readOnly = false;
                	field.min = 0.5;
                    field.max = 2.5;
                }

                else if (option == 'Median') {
                	field.readOnly = true;
					field.value=0;
                }

                else if (option == 'Weighted Average') {
                	field.readOnly = true;
                	field.value=0;
                }

                else {
                	field.readOnly = true;
                	field.value=0;
                }
            }
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

	<script type="text/javascript">
		$(function(){
    	$('#groups').on('change', function(){
        var val = $(this).val();
        var sub = $('#sub_groups1');
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

	<script type="text/javascript">
		$(function(){
	    $('#groups').on('change', function(){
	        var val = $(this).val();
	        var sub = $('#sub_groups2');
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
					<li><a href="../signout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
			<div>
			</div>
		</div>
	</div>

	<br>

	<div class="container">

	<?php 
		//echo $fname;
	//echo "<br>".$lname;
	//echo "<br>".$email;
	//echo "<br>user_data/".$folder;
	?>
		<div class="row">
			<form class="form-horizontal" action="submitform.php" method="POST" onsubmit="return validate()" role="form" enctype="multipart/form-data">

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">File Name:</label>
					<div class="col-sm-4">
						<select name="Image" id="groups" required>
			               	<option value="" selected="selected">Select</option>
							<option value="inputimage">inputimage</option>
							<option value="quickbird.jpg">quickbird.jpg</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="email" align="right">R band value:</label>
					<div class="col-sm-6">
		               	<select name="Rband" id="sub_groups" required>
			               	<option value="" selected="selected">Select</option>
							<option data-group='inputimage' value="1">1</option>
							<option data-group='quickbird.jpg' value="1">1</option>
							<option data-group='inputimage' value="2">2</option>
							<option data-group='quickbird.jpg' value="2">2</option>
							<option data-group='inputimage' value="3">3</option>
							<option data-group='quickbird.jpg' value="3">3</option>
							<option data-group='inputimage' value="4">4</option>
							<option data-group='inputimage' value="5">5</option>
							<option data-group='inputimage' value="6">6</option>
						</select>
		            </div>
	            </div>

	            <div class="form-group">
					<label class="control-label col-sm-4" for="email" align="right">G band value:</label>
					<div class="col-sm-6">
		               	<select name="Gband" id="sub_groups1" required>
			               	<option value="" selected="selected">Select</option>
							<option data-group='inputimage' value="1">1</option>
							<option data-group='quickbird.jpg' value="1">1</option>
							<option data-group='inputimage' value="2">2</option>
							<option data-group='quickbird.jpg' value="2">2</option>
							<option data-group='inputimage' value="3">3</option>
							<option data-group='quickbird.jpg' value="3">3</option>
							<option data-group='inputimage' value="4">4</option>
							<option data-group='inputimage' value="5">5</option>
							<option data-group='inputimage' value="6">6</option>
						</select>
	                </div>
	            </div>

	            <div class="form-group">
					<label class="control-label col-sm-4" for="email" align="right">B band value:</label>
					<div class="col-sm-6">
		               	<select name="Bband" id="sub_groups2" required>
			               	<option value="" selected="selected">Select</option>
							<option data-group='inputimage' value="1">1</option>
							<option data-group='quickbird.jpg' value="1">1</option>
							<option data-group='inputimage' value="2">2</option>
							<option data-group='quickbird.jpg' value="2">2</option>
							<option data-group='inputimage' value="3">3</option>
							<option data-group='quickbird.jpg' value="3">3</option>
							<option data-group='inputimage' value="4">4</option>
							<option data-group='inputimage' value="5">5</option>
							<option data-group='inputimage' value="6">6</option>
						</select>
	                </div>
	            </div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Name:</label>
					<div class="col-sm-4">
						<select id="format" name="format" onchange="changeValue(this);">
							<option value="">Choose</option>
		                    <option value="Average">Average</option>
		                    <option value="Circular">Circular</option>
		                    <option value="Gaussian">Gaussian</option>
		                    <option value="Median">Median</option>
		                    <option value="Weighted Average">Weighted Average</option>
		                </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Sigma</label>
					<div class="col-sm-4">
					<input type="number" name="titre" id="titre"/>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Window Size 1:</label>
					<div class="col-sm-4">
						<div class="radio radio-info radio-inline">
	                <input type="radio" id="3" value="3" name="ws1" required>
	                <label for="3"> 3 </label>
	            	</div>
		            <div class="radio radio-info radio-inline">
		            <input type="radio" id="5" value="5" name="ws1">
		            <label for="3"> 5 </label>
		            </div>
		            <div class="radio radio-info radio-inline">
		            <input type="radio" id="7" value="7" name="ws1">
		            <label for="7"> 7 </label>
		            </div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Window Size 2:</label>
					<div class="col-sm-4">
						<div class="radio radio-info radio-inline">
	                <input type="radio" id="3" value="3" name="ws2" required>
	                <label for="3"> 3 </label>
	            	</div>
		            <div class="radio radio-info radio-inline">
		            <input type="radio" id="5" value="5" name="ws2">
		            <label for="3"> 5 </label>
		            </div>
		            <div class="radio radio-info radio-inline">
		            <input type="radio" id="7" value="7" name="ws2">
		            <label for="7"> 7 </label>
		            </div>
					</div>
				</div>

				<div class="form-group">
			    	<label class="control-label col-sm-4"></label>
			    	<div class="col-sm-4">
			    		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			    	</div>
			    </div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right"></label>
					<div class="col-sm-4">
						<input type="text" class="red box">
						<input type="text" class="red box">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right"></label>
					<div class="col-sm-4">
						<div class="green box">You have selected <strong>green option</strong> so i am here</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right"></label>
					<div class="col-sm-4">
						<div class="blue box">You have selected <strong>blue option</strong> so i am here</div>
					</div>
				</div>
			</form>
		</div>
	</div>		
</body>
</html>
