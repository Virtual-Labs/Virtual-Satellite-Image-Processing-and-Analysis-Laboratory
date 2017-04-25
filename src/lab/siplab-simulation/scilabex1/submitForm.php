
<?php

$Image = $_POST['Image']; //All the required inputs
$r=$_POST['Rband'];
echo $r;
$g=$_POST['Gband'];
echo "<br>".$g;
$b=$_POST['Bband'];
echo "<br>".$b;
$subrow1=$_POST['subrow1'];
echo "<br>".$subrow1;
$subrow2=$_POST['subrow2'];
echo "<br>".$subrow2;
$subcol1=$_POST['subcol1'];
echo "<br>".$subcol1;
$subcol2=$_POST['subcol2'];
echo "<br>".$subcol1."<br>";



//check filename
if ($Image == "inputimage" || $Image == "quickbird.jpg") {

    putenv("SCIHOME=/home/Ubuntu/.Scilab/scilab-5.5.0"); //the code from master.sce is written here for the 1st experiment
         $code = "stacksize('max');mode(-1);
exec('/usr/share/scilab/contrib/sivp/loader.sce');
getd;
fname='$Image';
win4pix='win4pix.txt';
RGB=[$r $g $b];
subsetrow=[$subrow1 $subrow2];
subsetcol=[$subcol1 $subcol2];
img = imgdisplay(fname,RGB,subsetrow,subsetcol,win4pix);";
$code = str_replace('\"', '"', $code);
        $code = preg_replace("/[\n\r]/","", $code);
 exec('scilab -nw -nb -e "' . $code . ';exit;"', $output); //send code to scilab for execution
      
   

//display the outputs
 echo "<img src='out_original_img.jpg'>";
echo "<br><br><img src='out_subset_img.jpg'>";
echo "<br><br><img src='out_hist_band $r.jpg'>";
echo "<br><br><img src='out_hist_band $g.jpg'>";
echo "<br><br><img src='out_hist_band $b.jpg'>";
 } 
    
else{

print ("Wrong input");

}
 
?> 
    

 
  

