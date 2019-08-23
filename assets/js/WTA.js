var WTA = [];			//  Array to store Weekly Teacher Availability data

//	Function to convert Hours and Minutes into Minutes
function toMin(hour = 0,min = 0) 
{
	if (hour < 0 || hour > 24) 
	{
		////console.log("ERROR!!! Input 'hour' range should be between 0 & 24.") ;
		alert("ERROR!!! Input 'hour' range should be between 0 & 24.");
	}
	else if (min < 0 || min > 60) 
	{
		////console.log("ERROR!!! Input 'min' range should be between 0 & 60.") ;
		alert("ERROR!!! Input 'min' range should be between 0 & 60.");
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
		////console.log("ERROR!!! Input 'min' range should be between 0 & 1440. ") ;
		alert("ERROR!!! Input 'min' range should be between 0 & 1440. ")
	}
	else
	{
		return [Math.trunc(min / 60), min % 60];	
	}
}

//	Function to initialise WTA
function initWTA(unitDuration = 45,dayStartHour = 7,dayStartMin = 0,dayEndHour = 14,dayEndMin = 0) 
{
	var dayStartHour = dayStartHour;
	var dayStartMin = dayStartMin;
	var dayEndHour = dayEndHour;
	var dayEndMin = dayEndMin;

	const startTime = toMin(dayStartHour,dayStartMin);
	const endTime = toMin(dayEndHour,dayEndMin);

	for (var i = 0; i < 7; i++)			//	For 7 days of a week
	{
		var day = i;
		var currentTime = startTime;
		
		while(currentTime < endTime)
		{
			if ((currentTime - startTime) % unitDuration === 0) 
			{
				startHour = fromMin(currentTime)[0];
				startMin = fromMin(currentTime)[1];
				endHour = fromMin((currentTime + unitDuration))[0];
				endMin = fromMin((currentTime + unitDuration))[1];

				timeInstance = new TimeInstance(day,startHour,startMin,endHour,endMin);

				var wtaInstance = {
									isEmpty : true,
									time : timeInstance,
									availableTeachers : []
								  }

				WTA.push(wtaInstance);

				////console.log(day,startHour,startMin,endHour,endMin);
			}
			currentTime++;
		}
		
	}
}



function updateWTA() 
{
	////console.log('\n\nFunction : updateWTA()');

	for (var i = 0; i < WTA.length; i++) 
	{	
		////console.log("\t\tUpdating WTA element ",i + 1,"/",WTA.length)
		
		for (var j = 0; j < teacherDB.length; j++) 
		{
			////console.log("\t\t\tChecking teacherDB element ",j + 1,"/",teacherDB.length)	
	
			var teacher = teacherDB[j];
			////console.log("\t\t\tteacher = ",teacher.name);		

			for (var k = 0; k < teacher.freeTime.length; k++) 
			{
				////console.log("\t\t\t\tChecking freeTime element ",k + 1,"/",teacher.freeTime.length)	
			
				if (teacher.isAvailable(WTA[i].time)) 
				{
					////console.log('Currently Available');
					WTA[i].availableTeachers.push(teacher);
					WTA[i].availableTeachers.isEmpty = false;
					////console.log("\t\t\t\tPushed ",teacher);		
				}
				else
				{
					////console.log('Not Currently Available');
				
				}

			}
	
		}

	}

	////console.log("\tWeekly Teacher Availability array updated.")
}

