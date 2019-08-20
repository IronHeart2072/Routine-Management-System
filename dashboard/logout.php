<?php
session_start();
if($_SESSION['name']){	
	session_destroy();
	header("location:../cms/login.php");
}

?>