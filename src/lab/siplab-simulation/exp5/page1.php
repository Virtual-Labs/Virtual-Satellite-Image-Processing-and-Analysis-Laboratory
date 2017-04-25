<?php
	session_start();
	if(isset($_POST['submit'])){//to run PHP script on submit
		

		$fname=$_SESSION['fname'];
		$_SESSION['fname']=$fname;
		$lname=$_SESSION['lname'];
		$_SESSION['lname']=$lname;
		$email=$_SESSION['email'];
		$_SESSION['email']=$email;
		$folder=$_SESSION['folder'];
		$_SESSION['fname']=$folder;

		echo $fname;
		echo "<br>".$lname;
		echo "<br>".$email;
		echo "<br>user_data/".$folder;
	
		$format=$_POST['format'];
		$titre=$_POST['titre'];
		$titre1=$_POST['titre1'];

		echo "<br>Name= ".$format;
		echo "<br>var1= ".$titre;
		echo "<br>var2= ".$titre1;
	}
?>
