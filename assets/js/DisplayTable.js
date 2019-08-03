var timetable = new Timetable();

timetable.setScope(5,18);

timetable.addLocations(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);

timetable.addEvent('Keshav Dhami', 'Sunday', new Date(2019,9,7,7,00), new Date(2019,9,7,8,30), { url: '#' });
timetable.addEvent('Manish Aryal', 'Sunday', new Date(2015,9,7,8,30), new Date(2015,9,7,10,00), { class: 'vip-only' });


var renderer = new Timetable.Renderer(timetable);
renderer.draw('.timetable');