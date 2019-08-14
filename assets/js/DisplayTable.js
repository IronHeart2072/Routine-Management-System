function displayRoutine() 
{
	var timetable = new Timetable();

	timetable.setScope(5,19)

	timetable.addLocations(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);

	var day = 'Sunday';

	for (var i = 0; i < routine.length; i++) 
	{
		if (routine[i].course.cid != undefined) 
		{
			console.log(i,routine[i].time.startHour,routine[i].time.startMin,routine[i].time.endHour,routine[i].time.endMin);
			timetable.addEvent(routine[i].course.name, day, new Date(2019,9,7,routine[i].time.startHour,routine[i].time.startMin), new Date(2019,9,7,routine[i].time.endHour,routine[i].time.endMin));
		}

	}

	//timetable.addEvent('IT', day, new Date(2019,9,7,6,0), new Date(2019,9,7,6,30));
	/*timetable.addEvent(routine[3].course.name, day, new Date(2019,9,7,routine[3].time.startHour,routine[3].time.startMin), new Date(2019,9,7,routine[3].time.endHour,routine[3].time.endMin), { url: '#' });
	timetable.addEvent(routine[4].course.name, day, new Date(2019,9,7,routine[4].time.startHour,routine[4].time.startMin), new Date(2019,9,7,routine[4].time.endHour,routine[4].time.endMin), { url: '#' });
	timetable.addEvent(routine[5].course.name, day, new Date(2019,9,7,routine[5].time.startHour,routine[5].time.startMin), new Date(2019,9,7,routine[5].time.endHour,routine[5].time.endMin), { url: '#' });
	timetable.addEvent(routine[6].course.name, day, new Date(2019,9,7,routine[6].time.startHour,routine[6].time.startMin), new Date(2019,9,7,routine[6].time.endHour,routine[6].time.endMin), { url: '#' });
	timetable.addEvent(routine[7].course.name, day, new Date(2019,9,7,routine[7].time.startHour,routine[7].time.startMin), new Date(2019,9,7,routine[7].time.endHour,routine[7].time.endMin), { url: '#' });
*/
	var renderer = new Timetable.Renderer(timetable);
	renderer.draw('.timetable');
}