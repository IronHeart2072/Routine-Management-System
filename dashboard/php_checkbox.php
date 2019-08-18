<!DOCTYPE html>
<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
<link rel="stylesheet" href="css/php_checkbox.css" />
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
<form action="php_checkbox.php" method="post">
<!-- <input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label> -->

<input type="checkbox" name="check_list[]" value="1">Sunday<br>
<input type="checkbox" name="check_list[]" value="2">Monday<br>
<input type="checkbox" name="check_list[]" value="3">Tuesday <br>
<input type="checkbox" name="check_list[]" value="4">Wednesday<br>
<input type="checkbox" name="check_list[]" value="5">Thursday <br>
<input type="checkbox" name="check_list[]" value="6">Friday<br>
<input type="checkbox" name="check_list[]" value="7">Saturday <br>
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->
<?php include 'checkbox_value.php';?>
</form>
</div>
</div>
</body>
</html>