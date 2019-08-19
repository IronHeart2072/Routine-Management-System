<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once("../cms/class.database.php");


		$db_connection = new dbConnection();
		$link = $db_connection->connect(); 
		$query = $link->query("SELECT * FROM teacher");
		$query->setFetchMode(PDO::FETCH_ASSOC);					
		
		echo"<th>teacher Name</th>";
		echo"<th>teacher id</th>";
		
		while($result = $query->fetch())
		{
			 $name=$result['teacher_name'];
			 $id=$result['teacher_id'];
			 echo "$name"."$id"."<hr>";
?>


<script type="text/javascript" src="../JS/timetable.js"></script>
<script type="text/javascript" src="../JS/DisplayTable.js"></script>
<script type="text/javascript" src="../JS/TimeInstance.js"></script>
<script type="text/javascript" src="../JS/Teachers.js"></script>
<script type="text/javascript" src="../JS/Courses.js"></script>
<script type="text/javascript" src="../JS/WTA.js"></script>
<script type="text/javascript" src="../JS/Scheduller.js"></script>
<script type="text/javascript">
	var name = "<?php echo $name?>";
	var id = "<?php echo $id?>";
	var t1 = new  Teacher(id,name);
	console.log(t1);
</script>

 <?php
		}  						
		
?>
