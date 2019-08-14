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
			<legend>Register Here</legend>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="username">Collage Name</label>  
			  <div class="col-md-4">
			  <input id="uname" name="uname" type="text" placeholder="" class="form-control input-md" required="">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="username">Username</label>  
			  <div class="col-md-4">
			  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="email">Email</label>  
			  <div class="col-md-4">
			  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
				
			  </div>
			</div>

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="password">Password</label>
			  <div class="col-md-4">
				<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
				
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="register"></label>
			  <div class="col-md-4">
				<input type="submit" id="register" name="register" class="btn btn-success" value="Register">
			  </div>
			</div>

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

