<?php 
session_start();
$fname=$_SESSION['fname'];
$_SESSION['fname']=$fname;
$lname=$_SESSION['lname'];
$_SESSION['lname']=$lname;
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$folder=$_SESSION['folder'];
$_SESSION['folder']=$folder;
echo $folder;
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

	<nav class="navbar navbar-default" role="navigation" style="background-color:rgb(238,238,238);">
		<div class="container-fluid" style="background-color:rgb(238,238,238);">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<img src="iitblogo.png" style="height:96px; width:98px;"><b style="color:rgb(0,69,134); font-size:30px; font-family: "Times New Roman", Times, serif;"> IIT Bombay</b>&nbsp; <img src="vllogo.png">
				<a class="navbar-brand" href="index.php" style="height:100px; background-color:rgb(238,238,238);"></a>
			</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<br>
	<div class="container">
		<div class="row">
<?php echo $folder; ?>
			<form class="form-horizontal" action="submitForm.php" method="POST" onsubmit="return validate()" role="form" enctype="multipart/form-data">
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
	           <!-- <h4>There should be difference between the range of Subset row start & Subset row end and Subset column start & Subset column end be of 100. </h4> -->
		           
			    <div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Subset row start:</label>
					<div class="col-sm-2">
						<input type="text" name="subrow1" class="form-control" required>
					</div>
			    </div>

			    <div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Subset row end:</label>
					<div class="col-sm-2">
						<input type="text" name="subrow2" class="form-control" required>
					</div>
			    </div>

			    <div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Subset column start:</label>
					<div class="col-sm-2">
						<input type="text" name="subcol1" class="form-control" required>
					</div>
			    </div>

			    <div class="form-group">
					<label class="control-label col-sm-4" for="text" align="right">Subset column end:</label>
					<div class="col-sm-2">
						<input type="text" name="subcol2" class="form-control" required>
					</div>
			    </div>
				        
				<div class="form-group">
			    	<label class="control-label col-sm-4"></label>
			    	<div class="col-sm-4">
			    		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			    	</div>
			    </div>
			</form>
		</div>
	</div>		
</body>
</html>
