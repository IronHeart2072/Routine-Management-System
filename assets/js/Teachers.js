//	Temporary entities due to the absence of DB are represented by :- <[T]>

var teacherDB = [];			// Array to store data from Teacher DataBase000
 

// Class : Teacher
class Teacher
{
	constructor(eid,name)
	{
		this.eid = eid;
		this.name = name;
		this.freeTime = [];
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

	//	Function to check if a Teacher is available
	isAvailable(timeInstance) 
	{
		//console.log('\n\nFunction : isAvailable(timeInstance)')
		
		var teacher = this;
		//console.log(this);
		var ipTime = timeInstance;
		var isAvailable = false;
		
		for (var i = 0; i < teacher.freeTime.length; i++) 
		{
			var ipStartTime = toMin(ipTime.startHour,ipTime.startMin);
			var teacherStartTime = toMin(teacher.freeTime[i].startHour,teacher.freeTime[i].startMin);
			var ipEndTime = toMin(ipTime.endHour,ipTime.endMin);
			var teacherEndTime = toMin(teacher.freeTime[i].endHour,teacher.freeTime[i].endMin);
			
			//console.log('i = ',i);
			//console.log('teacherStartTime = ',teacherStartTime,'ipStartTime = ',ipStartTime);
			//console.log('teacherEndTime = ',teacherEndTime,'ipEndTime = ',ipEndTime);

			if ((ipTime.day === teacher.freeTime[i].day) && (teacherStartTime <= ipStartTime) && (teacherEndTime >= ipEndTime)) 
			{
				//console.log('true');
				return true;
			}
			else if (i == teacher.freeTime.length)
			{
				//console.log('false');
				return false;
			}
		}
	}

	getTotalUnits()
	{
		//console.log('\n\nFunction : getTotalUnits()')
		
		var totalUnits = 0;

		for (var i = 0; i < WTA.length; i++) 
		{
			if (!WTA[i].isEmpty) 
			{
				for (var j = 0; j <= WTA[i].availableTeachers.length; j++) 
				{
					if (WTA[i].availableTeachers[j].eid === this.eid) 
					{
						totalUnits++; 
						
					}
				}
			}
		}
		//console.log('\t\tTrue | totalUnits = ',totalUnits);
				
		return totalUnits;
	}
	
	getRemainingUnits(currentUnit)
	{
		//console.log('\n\nFunction : getRemainingUnits(currentUnit = ',currentUnit,')')
		
		var remainingUnits = 0;

		for (var i = currentUnit; i < WTA.length; i++) 
		{
			for (var j = 0; j < WTA[i].availableTeachers.length; j++) 
			{
				//console.log('\t Unit = ',i,' | TeacherDB index = ',j,' | Teacher eid = ',WTA[i].availableTeachers[j].eid);
				
				if (WTA[i].availableTeachers[j].eid === this.eid) 
				{
					remainingUnits++; 
					
					//console.log('\t\tTrue | remainingUnits = ',remainingUnits);
				}
			}
		}

		return remainingUnits;
	}



}
