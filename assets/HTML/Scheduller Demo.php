<script type="text/javascript" src="../JS/timetable.js"></script>
<script type="text/javascript" src="../JS/DisplayTable.js"></script>
<script type="text/javascript" src="../JS/TimeInstance.js"></script>
<script type="text/javascript" src="../JS/Teachers.js"></script>
<script type="text/javascript" src="../JS/Courses.js"></script>
<script type="text/javascript" src="../JS/WTA.js"></script>
<script type="text/javascript" src="../JS/Scheduller.js"></script>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once("../../cms/class.database.php");

	// To load data data from Teacher DB;
		$db_connection = new dbConnection();
		$link = $db_connection->connect(); 
		$query1 = $link->query("SELECT * FROM teacher");
		$query1->setFetchMode(PDO::FETCH_ASSOC);					
		
		while($result = $query1->fetch())
		{
			 $name=$result['teacher_name'];
			 $id=$result['teacher_id'];
?>

<script type="text/javascript">
	var name = "<?php echo $name?>";
	var id = "<?php echo $id?>";
	var teacher = new  Teacher(id,name);
	teacher.addTeacher();
</script>

 <?php
		// To load data data from Teacher DB;
		$query2 = $link->query("SELECT * FROM freetime");
		$query2->setFetchMode(PDO::FETCH_ASSOC);					
		
		while($result = $query2->fetch())
		{
			 $tid=$result['teacher_id'];
			 echo"$tid"." = "."$id"."<hr>";
			 if($tid==$id)
			 {
			 	// $day=$result['day'];
			 	$start_hour=$result['start_hour'];
			 	$start_min=$result['start_min'];
			 	$end_hour=$result['end_hour'];
			 	$end_min=$result['end_min'];

			 }
?>

<script type="text/javascript">
	console.log('Hello love');
	
	// var day = "<?php echo $day?>";
	var start_hour = "<?php echo $start_hour?>";
	var start_min = "<?php echo $start_min?>";
	var end_hour = "<?php echo $end_hour?>";
	var end_min = "<?php echo $end_min?>";
	console.log(teacher.name,start_hour,start_min,end_hour,end_min);

	teacher.addFreeTime(0,start_hour,start_min,end_hour,end_min);
	
</script>

 <?php
		}
	}
?>
<script type="text/javascript">console.log(teacherDB);</script>
