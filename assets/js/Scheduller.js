//	Temporary entities due to the absence of DB are represented by :- <[T]>


var wta = [];			//  Array to store Weekly Teacher Availability data
var schedule = [];			// Array to store generated Schedule

var teacherDB = [];			// Array to store data from Teacher DataBase 
var courseDB = [];			// Array to store data from Course DataBase





// Class : Teacher
class Teacher
{
	constructor(eid,name,)
	{
		this.eid = eid;
		this.name = name;
		this.freeTime = [];
	}

	console()
	{
		console.log(this);
	}

	
	//	<[T]> Function to check wether an Object of teacher class already exists in TeacherDB
	isTeacherExist()
	{
		for (var i = 0; i < teacherDB.length; i++) 
		{
			if (teacherDB[i].eid === this.eid) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	//	<[T]> Function to add objects of teacher class to TeacherDB
	addTeacher()
	{
		if (!this.isTeacherExist()) 
		{
			teacherDB.push(this);
		}
		else
		{
			alert("Teacher id already exists.");
		}
	}

	//	<[T]> Function to add start and end time
	addFreeTime(day,startHour,startMinute,endHour,endMinute) 
	{
		var timeInstance = {
							day : day,
							startHour : startHour,
							startMinute : startMinute,
							endHour : endHour,
							endMinute : endMinute
							}
		this.freeTime.push(timeInstance);
	}


}


//	Class : Course
class Course
{
	constructor(cid,name,teachers,totalNoOfClasses,noOfClassesTaken,currentSlack)
	{
		this.cid = cid;
		this.name = name;
		this.teachers  = teachers;
		this.totalNoOfClasses  = totalNoOfClasses;
		this.noOfClassesTaken  = noOfClassesTaken;
		this.currentSlack  = currentSlack;
	}

	console()
	{
		console.log(this);
	}

	//	<[T]> Function to check wether an Object of Course class already exists in courseDB
	isCourseExist()
	{
		for (var i = 0; i < courseDB.length; i++) 
		{
			if (courseDB[i].eid === this.eid) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	//	<[T]> Function to add objects of Course class to courseDB
	addCourse()
	{
		if (!this.isCourseExist()) 
		{
			courseDB.push(this);
		}
		else
		{
			alert("Course id already exists.");
		}
	}
}

var t1 = new Teacher(1,"KD");
//t1.console();
t1.addTeacher();
t1.addFreeTime(0,7,00,8,30);

var t2 = new Teacher(2,"MA");
//t2.console();
t2.addTeacher();
t2.addFreeTime(0,7,30,8,30);

var c1 = new Course(1,"Internet Technology",t1,6,0);
//c1.console();
c1.addCourse();

var c2 = new Course(2,"Software Programming Methodology",t2,5,0);
//c2.console();
c2.addCourse();
	
console.log('Teachers :- ',teacherDB);
console.log('Courses :- ',courseDB);
