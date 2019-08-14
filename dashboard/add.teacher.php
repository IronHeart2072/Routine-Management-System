<?php
   session_start();
  
if(@$_SESSION['user_id']){
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("../cms/header.php");
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   include_once("../cms/class.database.php");
   
   include_once("navbar.php");

   function GetTeacherInfo($user_id,$tcode){
			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->prepare("SELECT * FROM teacher WHERE user_id='$user_id' AND teacher_code = '$tcode'");
			$rowCount = $query->rowCount();
			if($rowCount ==1)
			{
				$result = $query->fetchAll();
				return $result;
			}
			else
			{
				return $rowCount;
			}
		}

   function add_teacher($user_id,$code,$name){
   			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->prepare("INSERT INTO teacher (user_id,teacher_code,teacher_name) VALUES(?,?,?)");
			$values = array ($user_id,$code,$name);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
		}

   
   function addFreeTime($day,$startHour,$startMin,$endHour,$endMin){
  			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->prepare("INSERT INTO freetime (day,start_hour,start_min,end_hour,end_min) VALUES(?,?,?,?,?)");
			$values = array ($day,$startHour,$startMin,$endHour,$endMin);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
	
   }

   	if(isset($_POST['submit']))
	{
		$check_teacher = GetTeacherInfo($_SESSION['user_id'],$_POST['tcode']);

		if($check_teacher === 0){
			$count= add_teacher($_SESSION['user_id'],$_POST['tcode'],$_POST['name']);
			$count1= addFreeTime($_POST['days'],$_POST['sh'],$_POST['sm'],$_POST['eh'],$_POST['em']);
				if($count && $count1){ 
				
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
		else{
					echo '<div class="alert alert-block">  
					<a class="close" data-dismiss="alert">X</a>  
					<strong>Opps Error!</strong>Subject Already Exists.  
					</div>'; 			
			}
			
	}
}

?>


<div class="container"> 
  <div class="row">
    <div class="col-lg-6">
		<div class="jumbotron">

				<form class="form-horizontal" method= "POST" action="">
				<fieldset>

				<!-- Form Name -->
				<legend>Add Teacher</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="name">Teacher code</label>  
				  <div class="col-md-8">
				  <input id="tcode" name="tcode" type="text" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="name">Teacher Name</label>  
				  <div class="col-md-8">
				  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="name">Day</label>  
				  <div class="col-md-8">				  	
					  <label ><input type="checkbox" id="sun" class="checkbox-inline" name="days"  /> Sun</label>
					  <label ><input type="checkbox" id="mon" class="checkbox-inline" name="days"  /> Mon</label>
					  <label ><input type="checkbox" id="tue" class="checkbox-inline" name="days"  /> Tue</label>
					  <label ><input type="checkbox" id="wed" class="checkbox-inline" name="days"  /> Wed</label>
					  <label ><input type="checkbox" id="thu" class="checkbox-inline" name="days"  /> Thu</label>
					  <label ><input type="checkbox" id="fri" class="checkbox-inline" name="days"  /> Fri</label>
					  <label ><input type="checkbox" id="sat" class="checkbox-inline" name="days"  /> Sat</label>
					 
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="t">Free Time</label>  
				  <div class="col-md-4">
				  <input id="sh" name="sh" type="text" placeholder=" start hour" class="form-control input-md" required=""> 
				  <input id="sm" name="sm" type="text" placeholder=" start minute" class="form-control input-md" required=""> 
				  <span class="help-block"></span>  
				  </div>

				  <div class="col-md-4">
				  <input id="eh" name="eh" type="text" placeholder=" end hour" class="form-control input-md" required=""> 
				  <input id="em" name="em" type="text" placeholder=" end minute" class="form-control input-md" required=""> 
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-8">
					<button id="submit" name="submit" class="btn btn-primary">Add Teacher</button>
				  </div>
				</div>

				</fieldset>
				</form>
		</div>		
    </div>

  </div>
  
</div>
