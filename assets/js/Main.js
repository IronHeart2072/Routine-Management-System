function start() 
{
	var t1 = new Teacher(1,"KD");
	//t1.console();
	t1.addTeacher();
	t1.addFreeTime(0,7,00,12,30);

	var t2 = new Teacher(2,"MA");
	//t2.console();
	t2.addTeacher();
	t2.addFreeTime(0,7,30,8,30);
	//t2.addFreeTime(0,9,30,10,30);
		
	console.log('Teachers :- ',teacherDB);


	var c1 = new Course(1,"Internet Technology",t1,6,0);
	//c1.console();
	c1.addCourse();

	var c2 = new Course(2,"Software Programming Methodology",t2,5,0);
	//c2.console();
	c2.addCourse();

	console.log('Courses :- ',courseDB);


	initWTA(45);

	var timeInst = new TimeInstance(0,7,0,8,30);
	//isAvailable(timeInst);

	updateWTA();

	//console.log(c1.needsSchedulling());
	//console.log(t1.getRemainingUnits(3));

	initRoutine();
	schedule();
	//console.log(c1.getSlack());

}

function test1() 
{
	for (var i = 0; i < teacherDB.length; i++) 
	{
		var teacher = teacherDB[i];
		console.log('\n\tTeacher = ',teacher);
		for (var j = 0; j < WTA.length; j++) 
		{
			console.log('\tWTA Unit = ',j);
			console.log('\tisAvailable = ',teacher.isAvailable(WTA[j].time));
		}
	
	}
	
}