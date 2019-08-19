<?php
   session_start();
 
if(@$_SESSION['user_id']){
	
   $path = $_SERVER['DOCUMENT_ROOT'];
   // $path .= "/timetable/header.php";
   include_once("../cms/header.php");
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   // $path .= "/timetable/class.database.php";
   include_once("../cms/class.database.php");
   
   include_once("navbar.php");
   
	function GetSubjectInfo($subcode,$user_id){
			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->query("SELECT * FROM subject WHERE subject_code = '$subcode' AND user_id='$user_id'");
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
	
	function add_subjects($user_id,$code,$name,$lecture,$tutorial,$practicle){
			$db_connection = new dbConnection();
			$link = $db_connection->connect(); 
			$query = $link->prepare("INSERT INTO subject (user_id,subject_code,subject_name,l,t,p) VALUES(?,?,?,?,?,?)");
			$values = array ($user_id,$code,$name,$lecture,$tutorial,$practicle);
			$query->execute($values);
			$count = $query->rowCount();
			return $count;
		}
	
	if(isset($_POST['submit']))
	{
			$check_subject = GetSubjectInfo($_POST['subcode'],$_SESSION['user_id']);
		if($check_subject === 0){
			$count= add_subjects($_SESSION['user_id'],$_POST['subcode'],$_POST['name'],$_POST['l'],$_POST['t'],$_POST['p'] );
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
		else{
			echo '<div class="alert alert-block">  
					<a class="close" data-dismiss="alert">X</a>  
					<strong>Opps Error!</strong>Subject Already Exists.  
					</div>'; 			
		}
		
	}
	
}
else{
	echo "You are not logged in yet. please go back and login again";
	exit();
}
?>


<div class="container-fluid"> 
  <div class="row">
    <div class="col-lg-4">
		<div class="jumbotron">

				<form class="form-horizontal" method= "post" action="">
				<fieldset>

				<!-- Form Name -->
				<legend>Add Subjects</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="subcode">Subject Code</label>  

				  <input id="subcode" name="subcode" type="text" placeholder="" class="form-control input-md" required="">

				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="name">Subject Name</label>  

				  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">

				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="l">Total Lecture</label>  

				  <input id="l" name="l" type="text" placeholder="L" class="form-control input-md" required="">
				  <span class="help-block">Total lecture for this subject</span>  

				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="t">Total Tutorial</label>  

				  <input id="t" name="t" type="text" placeholder="T" class="form-control input-md" required="">
				  <span class="help-block">Total tutorial for this subject</span>  

				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="p">Total Practical</label>  

				  <input id="p" name="p" type="text" placeholder="P" class="form-control input-md" required="">

				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="control-label" for="submit"></label>

					<button id="submit" name="submit" class="btn btn-success">Add Subject</button>

				</div>

				</fieldset>
				</form>
		</div>		
    </div>
    <div class="col-lg-8">
		<?php
			if($_SESSION['user_id']){
				
				function deletesub($subcode, $user_id){
					$db_connection = new dbConnection();
					$link = $db_connection->connect(); 
					$link->query("DELETE FROM `timetable`.`subject` WHERE `subject`.`subject_id` = '$subcode' AND `subject`.`user_id`='$user_id'");
				}
				if(isset($_GET['delete'])){
					 deletesub($_GET['id'],$_SESSION['user_id']);
					 echo 	'<div class="alert alert-success">  
							<a class="close" data-dismiss="alert">X</a>  
							<strong>Tada Success! </strong>Successfully Deleted.  
							</div>'; 
				}
				
				// This function lists all the timetable created till now.. with options like delete, edit
				function Subjectlist($user_id){
					$db_connection = new dbConnection();
					$link = $db_connection->connect(); 
					$query = $link->query("SELECT * FROM subject WHERE user_id= '$user_id'");
					$query->setFetchMode(PDO::FETCH_ASSOC);
					
					
					echo
						  "<h2>List of Subjects Already Added</h2>".          
						  "<table class='table table-bordered'>".
							"<thead>".
							  "<tr>".
							   "<th>Subject Id</th>".
								"<th>Subject Code</th>".
								"<th>Subject Name</th>".
								"<th>L</th>".
								"<th>T</th>".
								"<th>P</th>".
								"<th>Options</th>".
							  "</tr>".
							"</thead>".
							"<tbody>";
							
							while($result = $query->fetch()){
							  echo "<tr>"
									."<td>".$result['subject_id']."</td>"
									 ."<td>".$result['subject_code']."</td>"
									 ."<td>".$result['subject_name']."</td>"
									 ."<td>".$result['l']."</td>"
									 ."<td>".$result['t']."</td>"
									 ."<td>".$result['p']."</td>"
									 ."<td><a href='add.subject.php?delete=true&id=".$result['subject_id']."'>Delete</a></td>"
									 ."</tr>".
							  "</tr>";
							}  
					echo	"</tbody>".
						  "</table>".
						"</div>";
						
				}
				
				Subjectlist($_SESSION['user_id']);
			}
			else{
				echo "You are not logged in yet. Please go back and login again";
			}
		?>
		
    </div>
  </div>
  
</div>