//	Temporary entities due to the absence of DB are represented by :- <[T]>

var WTA = [];			//  Array to store Weekly Teacher Availability data

//	Function to convert Hours and Minutes into Minutes
function toMin(hour = 0,min = 0) 
{
	if (hour < 0 || hour > 24) 
	{
		console.log("ERROR!!! Input 'hour' range should be between 0 & 24. ") ;
	}
	else if (min < 0 || min > 60) 
	{
		console.log("ERROR!!! Input 'min' range should be between 0 & 60. ") ;
	}
	else
	{
		return ((hour * 60) + min);
	}
}

//	Function to convert Minutes into Hour and Minutes
function fromMin(min = 0) 
{
	if (min < 0 || min > 60 * 24) 
	{
		console.log("ERROR!!! Input 'min' range should be between 0 & 60. ") ;
	}
	else
	{
		return [Math.trunc(min / 60), min % 60];	
	}
}

//	Function to initialise WTA
function initWTA(unitDuration) 
{
	var dayStartHour = 6;
	var dayStartMin = 0;
	var dayEndHour = 14;
	var dayEndMin = 0;
	
	var startTime = toMin(dayStartHour,dayStartMin);
	var endTime = toMin(dayEndHour,dayEndMin);

	let count = 0;

	for (var i = startTime; i <= endTime; i++) 
	{
		if (count % unitDuration === 0) 
		{
			var timeInstance = new TimeInstance(0,fromMin(i)[0],fromMin(i)[1],fromMin(i + unitDuration)[0],fromMin(i + unitDuration)[1]);
			var wtaInstance = {
								time : timeInstance,
								availableTeachers : []
							  }
			WTA.push(wtaInstance);
		}

		count++;	
	}
}


function updateWTA() 
{
	console.log('\n\nFunction : updateWTA()');

	for (var i = 0; i < WTA.length; i++) 
	{	
		console.log("\t\tUpdating WTA element ",i + 1,"/",WTA.length)
		
		for (var j = 0; j < teacherDB.length; j++) 
		{
			console.log("\t\t\tChecking teacherDB element ",j + 1,"/",teacherDB.length)	
	
			var teacher = teacherDB[j];

			for (var k = 0; k < teacher.freeTime.length; k++) 
			{
				console.log("\t\t\t\tChecking freeTime element ",k + 1,"/",teacher.freeTime.length)	
			
				if (teacher.isTeacherAvailable(WTA[i].time)) 
				{
					WTA[i].availableTeachers.push(teacher);
				}

			}
	
		}

	}

	console.log("\tWeekly Teacher Availability array updated.")
}

