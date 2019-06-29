//	Temporary entities due to the absence of DB are represented by :- <[T]>

var courseDB = [];			// Array to store data from Course DataBase

//	Class : Course
class Course
{
	constructor(cid,name,teachers,totalNoOfClasses,noOfClassesTaken,currentSlack)
	{
		this.cid = cid;
		this.name = name;
		this.teachers  = teachers;
		this.totalNoOfClasses  = totalNoOfClasses;
		this.noOfClassesTaken  = noOfClassesTaken;
		this.currentSlack  = currentSlack;
	}

	console()
	{
		console.log(this);
	}

	//	<[T]> Function to check wether an Object of Course class already exists in courseDB
	isCourseExist()
	{
		for (var i = 0; i < courseDB.length; i++) 
		{
			if (courseDB[i].cid === this.cid) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	//	<[T]> Function to add objects of Course class to courseDB
	addCourse()
	{
		if (!this.isCourseExist()) 
		{
			courseDB.push(this);
		}
		else
		{
			alert("Course id already exists.");
		}
	}
}

var c1 = new Course(1,"Internet Technology",t1,6,0);
//c1.console();
c1.addCourse();

var c2 = new Course(2,"Software Programming Methodology",t2,5,0);
//c2.console();
c2.addCourse();

console.log('Courses :- ',courseDB);
