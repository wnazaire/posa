#include    <iostream>
#include    <string>
#include	<fstream>
#include	"appointment.h"
#include	"schedule.h"
#include	"user.h"
#include	"db.h"

using namespace std;

void setup(DB *, Schedule *);					//Loads users and appointments
void save(DB *, Schedule *);					//Saves users and appointments
User * login();									//Allows a customer access, returns pointer to a user object
User * signup();								//Allows a user to sign up and then gain access, returns pointer to a user object

int main()
{
	int choice = 1;								//originally 1 so it enters the while loop the first time
	User *u = 0;
	DB *db = new DB();
	Schedule *sch = new Schedule();
	setup(db, sch);

	cout << "Would you like to log in or sign up";
	cout << "\t1. Login";
	cout << "\t2. Sign up";
	cin >> choice;
	
	if (choice == 1)
		u = login();
	else
		u = signup();

	if (!u)										//if login/signup fails, terminate
	{
		return 0;
	}

	do
	{
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
			//if (u->getPriviledge() != "1")	
			//	viewSchedule();
			break;
		case 8:
			//if (u->getPriviledge() != "1")
			//	acceptAppointment(u)
			break;
		}

		cout << "Please select an option to continue:\n";
		cout << "\t1. Display options\n";
		cout << "\t2. Exit\n";
		cout << "\t3. Make an appointment\n";
		cout << "\t4. View an appointment\n";
		cout << "\t5. View my appointments\n";	//we might need a log in feature to do this if we implement it at all
		cout << "\t6. Edit an appointment\n";
		//if (u->getPriviledge() != 1)			//if the user is not a customer
		//{
		//	cout << "\t7. View schedule";
		//	cout << "\t8. Accept appointment";
		//}

	} while (cin >> choice);
	
	save(db, sch);
	
	return 0;
}

void setup(DB *db, Schedule *sch)
{
	//read in users and appointments from appropriate txt files
	ifstream infile_users;
	ifstream infile_appts;
	string user;
	string appt;

	string n, pw, p, un;						//User's name, password, privilege, and username
	int b, e;

	infile_users.open("users.txt");				//Open users file
	if (infile_users)
	{
		while (getline(infile_users, user)){
			b = e = 0;

			e = user.find(':');					//Colon as delimiter
			n = user.substr(b, e - 1);
			b = e + 1;
			user = user.substr(e + 1);

			e = user.find(':');
			pw = user.substr(b, e - 1);
			b = e + 1;
			user = user.substr(e + 1);

			p = user[e];						//Privilege is one charactor
			b = e + 2;

			un = user.substr(b);

			db->users.push_back(new User(n, pw, p, un));
		}
	}
	else										//The program will not crash if the file isn't found.
	{
		cerr << "File could not be found.\n";
	}
	infile_users.close();

	string r, d, t, id;							//Appointment reason, date, time, id

	infile_appts.open("appts.txt");				//Open file
	if (infile_appts)
	{
		while (getline(infile_appts, appt)){
			b = e = 0;

			e = user.find('^#$');				//^#$ as delimiter
			r = user.substr(b, e - 1);
			b = e + 1;
			user = user.substr(e + 1);

			e = user.find('^#$');
			d = user.substr(b, e - 1);
			b = e + 1;
			user = user.substr(e + 1);

			e = user.find('^#$');
			t = user.substr(b, e - 1);
			b = e + 1;
			user = user.substr(e + 1);

			id = user.substr(b);

			sch->add(new Appointment(n, pw, p, un));
		}
	}
	else
	{
		cerr << "File could not be found.\n";
	}
	infile_users.close();
}

void save(DB *db, Schedule *sch)
{
	ofstream outfile_users;
	outfile_users.open("users.txt");
	vector<User *>::iterator it;
	for (it = db->users.begin(); it != db->users.end(); it++)
	{
		outfile_users << (*it)->getName() << ":" << (*it)->getPassword() << ":" << (*it)->getPrivilege() << ":" << (*it)->getUsername() << "\n";
	}
	outfile_users.close();

	ofstream outfile_appts;
	outfile_appts.open("appts.txt");
	vector<Appointment *>::iterator iter;
	for (iter = sch->getSchedule().begin(); iter != sch->getSchedule().end(); iter++)
	{
		outfile_appts << (*iter)->getReason() << "^#$" << (*iter)->getDate() << "^#$" << (*iter)->getTime() << "^#$" << (*iter)->getID() << "\n";
	}
	outfile_appts.close();
}

User * login()
{

}

User * signup()
{

}