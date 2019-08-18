<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("header.php");
?>
<body>
	<div id="content" class="register">
		<div id="form" class="container">
		<form class="form-horizontal" method="post" action="register.php">
			<fieldset>

			<!-- Form Name -->
			<legend><a href="../index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a><span>Registration Form</span></legend>
			
			<!-- Text input-->
			<div class="form-group">
			  <input id="uname" name="uname" type="text" placeholder="College Name" class="form-control input-md" required="">
				
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
				
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required="">
				
			</div>

			<!-- Password input-->
			<div class="form-group">
				<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
				
			</div>

			<!-- Button -->
				<input type="submit" id="register" name="register" class="btn btn-login" value="Register">


			</fieldset>
		</form>
		</div>
	</div>
			
	<script type="text/javascript">
		console.log("					<?php
						echo $path;
					?>
			");
	</script>			


</body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("footer.php");
?>

