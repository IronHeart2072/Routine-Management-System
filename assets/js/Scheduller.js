//	Temporary entities due to the absence of DB are represented by :- <[T]>

var routine = [];			// Array to store generated Schedule
var courseSlack = []			//	Array to store Slack of	Courses for a specific Unit of the Routine

function schedule() 
{
	for (var i = 0; i < WTA.length; i++)	//	For the Unit of time of Routine
	{
		for (var j = 0; j < courseDB.length; j++)	//	For each Course
		{	
			if (courseDB[j].needsSchedulling())	//	Checking if the Course needs schedulling 
			{
				for (var k = 0; k < WTA[i].availableTeachers.length; k++) 
				{
					
				}	
			}
			
		}
	} 
		
}