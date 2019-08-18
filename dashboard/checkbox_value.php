<?php
 // include_once("../cms/class.database.php");
if(isset($_POST['submit']))
{

$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="v1.1";//database name  
$tbl_name="day"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name");



$checkbox1=$_POST['check_list'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk = $chk1;  
      $in_ch=mysqli_query($con,"INSERT INTO day(day) values ('$chk')");
		if($in_ch==1)  
		   {  
		      echo'<script>alert("Inserted Successfully")</script>';  
		   }  
		else  
		   {  
		      echo'<script>alert("Failed To Insert")</script>';  
		   }  
   }  

}

?> 