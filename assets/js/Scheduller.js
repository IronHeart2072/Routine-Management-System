//	Temporary entities due to the absence of DB are represented by :- <[T]>

var currentUnit;
var routine = [];			// Array to store generated Schedule
var courseSlack = [];

function initRoutine() 
{
	console.log('\n\nFunction : initRoutine()')
	for (var i = 0; i < WTA.length; i++) 
	{
		var routineObject = {
								time:WTA[i].time,
								course: "TBA",
								teacher: "TBA"
								};

		routine.push(routineObject);
	}
}

function schedule() 
{
	for (var i = 0; i < WTA.length; i++)	//	For the Unit of time of Routine
	{
		currentUnit = i; 
		//var courseSlack = []			//	Array to store Slack of	Courses for a specific Unit of the Routine

		console.log('At WTA unit ',i);	
		for (var j = 0; j < courseDB.length; j++)	//	For each Course
		{	
			if (courseDB[j].needsSchedulling())	//	Checking if the Course needs schedulling 
			{
				console.log('\t',courseDB[j].name,'needs schedulling.');
			/*
				for (var k = 0; k < courseDB[j].teachers.length; k++) 
				{
			*/
					var teacher = courseDB[j].teachers;
					
					if (courseDB[j].teachers.isAvailable(WTA[i].time)) 
					{
						console.log('\t\t',courseDB[j].teachers.name,' is available.');	
					}		
					else
					{
						console.log('\t\t',courseDB[j].teachers.name,' is not available.');	
					}

			/*
				}
			*/



			}
		}		
	} 
		
}
