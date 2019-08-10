//	Temporary entities due to the absence of DB are represented by :- <[T]>

var currentUnit;
var routine = [];			// Array to store generated Schedule

function schedule() 
{
	for (var i = 0; i < WTA.length; i++)	//	For the Unit of time of Routine
	{
		currentUnit = i; 
		var courseSlack = []			//	Array to store Slack of	Courses for a specific Unit of the Routine

		for (var j = 0; j < courseDB.length; j++)	//	For each Course
		{	
			if (courseDB[j].needsSchedulling())	//	Checking if the Course needs schedulling 
			{
				if (courseDB[j].teachers.isAvailable(i)) 
				{
					console.log('Slack of ',courseDB[j].name,' at unit ',i,' = ',courseDB[j].getSlack(courseDB[j].teachers));
					courseSlack.push(courseDB[j].getSlack(courseDB[j].teachers));
					courseDB[j].noOfClassesTaken++;
				}
			}
			
		}

		console.log("Unit : ",i,'\ncourseSlack = ',courseSlack);
	} 
		
}
