var schedule = [];



//	Class : "Teacher"
class Teacher 
{
	constructor(eId,name)
	{
		this.eId = eId;
		this.name = name;
	}

	//	Function to display variables of Class : "Teacher" in console
	console()
	{
		console.log(
					'Class : Teacher','\n\t',
					'Id = ',this.eId,'\n\t',
					'Name = ',this.name,'\n\t',
					);
		
	}

}

var t1 = new Teacher(01,"KD");
t1.console();