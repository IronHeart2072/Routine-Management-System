<?php  
 session_start();
  
if(@$_SESSION['user_id']){
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("../cms/header.php");
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("../cms/class.database.php");
   
   include_once("navbar.php");


		function addFreeTime($user_id,$teacher_id,$day,$startHour,$startMin,$endHour,$endMin){
  			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->prepare("INSERT INTO freetime (user_id,teacher_id,day,start_hour,start_min,end_hour,end_min) VALUES(?,?,?,?,?,?,?)");
			$values = array($user_id,$teacher_id,$day,$startHour,$startMin,$endHour,$endMin);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
	   }


		if(isset($_POST['submit']))
		{
			$count= addFreeTime($_SESSION['user_id'],$_POST['name'],$_POST['days'],$_POST['sh'],$_POST['sm'],$_POST['eh'],$_POST['em']);
				if($count){ 
				
						echo 	'<div class="alert alert-success">  
						<a class="close" data-dismiss="alert">X</a>  
						<strong>Tada Success! </strong>Added Successfully.  
						</div>'; 
				}
				else{
						echo '<div class="alert alert-block">  
						<a class="close" data-dismiss="alert">X</a>  
						<strong>Opps Error!</strong>Not Added.  
						</div>';  
				}
		}	
}
?>

<div class="container-fluid"> 
  <div class="row">
    <div class="col-lg-4">
		<div class="jumbotron">

		<form class="form-horizontal" method= "POST" action="">
			<fieldset>

				<!-- Form Name -->
				<legend>Add Free Time</legend>

				<!-- Select Basic -->
			<div class="form-group">
			  <label class="control-label" for="name">Teacher name</label>
				<select id="name" name="name" class="form-control">
					<option value="" selected disabled hidden></option>
				<?php
				    $db_connection = new dbConnection();
					$link = $db_connection->connect(); 
					$user_id= $_SESSION['user_id'];
					$query = $link->query("SELECT * FROM teacher WHERE user_id= '$user_id'");
					$query->setFetchMode(PDO::FETCH_ASSOC); 				
				while($result = $query->fetch()){
					echo '<option value="'.$result['teacher_id'].'">'.$result['teacher_name'].'</option>';
				  }?>
				</select>
			</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="name">Day</label>  <br>
					  <label ><input type="checkbox" id="sun" class="checkbox-inline" name="days[]" values="1"/> Sun</label>
					  <label ><input type="checkbox" id="mon" class="checkbox-inline" name="days[]" values="2"/> Mon</label>
					  <label ><input type="checkbox" id="tue" class="checkbox-inline" name="days[]" values="3"/> Tue</label>
					  <label ><input type="checkbox" id="wed" class="checkbox-inline" name="days[]" values="4"/> Wed</label>
					  <label ><input type="checkbox" id="thu" class="checkbox-inline" name="days[]" values="5"/> Thu</label>
					  <label ><input type="checkbox" id="fri" class="checkbox-inline" name="days[]" values="6"/> Fri</label>
					  <label ><input type="checkbox" id="sat" class="checkbox-inline" name="days[]" values="7"/> Sat</label>					 
				</div>

				<!-- Text input-->
				<div class="form-group start-hr">
				  <label class="control-label" for="t">Free Time</label>  
				  <input id="sh" name="sh" type="text" placeholder=" start hour" class="form-control input-md" required=""> 
				  <input id="eh" name="eh" type="text" placeholder=" end hour" class="form-control input-md" required=""> 
				  <input id="sm" name="sm" type="text" placeholder=" start minute" class="form-control input-md" required=""> 
				  
				  
				  <input id="em" name="em" type="text" placeholder=" end minute" class="form-control input-md" required=""> 
				  <span class="help-block"></span> 
				</div>


				<!-- Button -->
				<div class="form-group">
				  <label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="btn btn-primary">Add Time</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>


</div>
</div>
