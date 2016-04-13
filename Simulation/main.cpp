#include    <iostream>
#include    <string>
#include	<fstream>
#include	"appointment.h"
#include	"schedule.h"
#include	"user.h"
using namespace std;
void setup();									//Loads users and appointments
void save();									//Saves users and appointments
User * login();								//Allows a customer access, returns pointer to a user object
User * signup();								//Allows a user to sign up and then gain access, returns pointer to a user object

int main()
{
	setup();
	int choice;
	User *u = 0;

	cout << "Would you like to log in or sign up";
	cout << "\t1. Login";
	cout << "\t2. Sign up";
	
	if (choice == 1)
		u = login();
	else
		u = signup();

	if (!u)										//if login/signup fails, terminate
	{
		return 0;
	}

	int choice = 1;								//originally 1 so it enters the while loop the first time

	while (cin >> choice)
	{
		cout << "Please select an option to continue:";
		cout << "\t1. Display options";
		cout << "\t2. Exit";
		cout << "\t3. Make an appointment";
		cout << "\t4. View an appointment";
		cout << "\t5. View my appointments";	//we might need a log in feature to do this if we implement it at all
		cout << "\t6. Edit an appointment";
		if (u->getPriviledge() != 1)			//if the user is not a customer
		{
			cout << "\t7. View schedule";
			cout << "\t8. Accept appointment";
		}

		if (choice == 2)
		{
			break;								// terminate loop when the user selects 6
		}

		switch (choice)
		{
		case 3:
			//createAppointment(u);
			break;
		case 4:
			//viewAppointment(u);
			break;
		case 5:
			//viewAppointments(u);				//the difference here is an 's', be careful
			break;
		case 6:
			//editAppointment(u);
			break;
		case 7:
			//if (u->getPriviledge() != 1)	
			//	viewSchedule();
			break;
		case 8:
			//if (u->getPriviledge() != 1)
			//	acceptAppointment(u)
			break;
		}
	}
	
	save();
	
	return 0;
}

void setup()
{
	//read in users and appointments from appropriate txt files
	ifstream infile_users;
	ifstream infile_appts;
	string user;
	string appt;

	infile_users.open("users.txt");				//Open file
	if (infile_users)
	{											//If the file exists, evaluate expressions
		while (getline(infile_users, user)){
			//business logic for parsing user and creating new users
		}
	}
	else										//The program will not crash if the file isn't found.
	{
		cerr << "File could not be found.\n";
	}
	infile_users.close();

	infile_appts.open("users.txt");				//Open file
	if (infile_appts)
	{											//If the file exists, evaluate expressions
		while (getline(infile_appts, appt)){
			//business logic for parsing appt and creating new appts
		}
	}
	else										//The program will not crash if the file isn't found.
	{
		cerr << "File could not be found.\n";
	}
	infile_users.close();
}

void save()
{
	//write users and appointments to appropriate txt files
}