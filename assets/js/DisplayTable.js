function displayRoutine() 
{
	var timetable = new Timetable();

	timetable.setScope(6,14)

	timetable.addLocations(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);

	var day = 'Sunday';

	for (var i = 0; i < routine.length; i++) 
	{
		if (routine[i].course.cid != undefined) 
		{
			timetable.addEvent(routine[i].course.name, day, new Date(2019,9,7,routine[i].time.startHour,routine[i].time.startMin), new Date(2019,9,7,routine[i].time.endHour,routine[i].time.endMin), { url: '#' });
		}

	}

//	timetable.addEvent(routine[2].course.name, day, new Date(2019,9,7,routine[2].time.startHour,routine[2].time.startMin), new Date(2019,9,7,routine[2].time.endHour,routine[2].time.endMin), { url: '#' });

	var renderer = new Timetable.Renderer(timetable);
	renderer.draw('.timetable');
}