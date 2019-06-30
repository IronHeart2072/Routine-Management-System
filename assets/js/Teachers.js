//	Temporary entities due to the absence of DB are represented by :- <[T]>

var teacherDB = [];			// Array to store data from Teacher DataBase 

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
	addFreeTime(day,startHour,startMin,endHour,endMin) 
	{
		/*var timeInstance = {
							day : day,
							startHour : startHour,
							startMin : startMin,
							endHour : endHour,
							endMin : endMin
							}*/
		var timeInstance = new TimeInstance(day,startHour,startMin,endHour,endMin)
		this.freeTime.push(timeInstance);
	}


}

