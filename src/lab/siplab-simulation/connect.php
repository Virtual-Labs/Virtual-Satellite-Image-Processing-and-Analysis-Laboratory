<?php
  //$global_db = mysql_connect("localhost","ae96bc5b_handymu","ae96bc5b_handymp");
$global_db = mysql_connect("localhost","root","");
   if(!$global_db)
   {
   die('Error occured:'.mysql_error());
   }
   else
   {
   
   }
 
 mysql_select_db("siplab", $global_db);
?>
