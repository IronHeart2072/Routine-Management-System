//	Temporary entities due to the absence of DB are represented by :- <[T]>


var WTA = [];			//  Array to store Weekly Teacher Availability data
var schedule = [];			// Array to store generated Schedule

//	Function to convert Hours into Minutes
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
		count++;

		if (count % unitDuration === 0) 
		{
			WTA.push(["Single Period"]);
		}	
	}

}

console.log(fromMin(125));
initWTA(45);