#include "appointment.h"
#include "user.h"
#include "schedule.h"
#include <iostream>
#include <fstream>
#include <string.h>
using namespace std;

int Appointment::count = 0;

Appointment::Appointment(string r, string d, string t, string u, string te, string i)
{
	reason = r;
	date = d;
	time = t;
	id = i;
	customer = u;
	tech = te;
	count++;
}

Appointment::Appointment(string r, string d, string t, string u)
{
	reason = r;
	date = d;
	time = t;
	customer = u;
	id = to_string(count);
	count++;
}

void Appointment::viewAppointments(User *)
{

}

void Appointment::edit(User *)
{
	
	int choice; 
	fstream sch; 
	sch.open("schedule.txt"); 

	cout << "Enter Appointment ID. \n"; 
	cin >> ID; 

	size_t pos; 
	while (sch.good())
	{
		
		getline(sch, line);				//Get ID from text file
		pos = line.find(ID); 
		if (pos != string::npos)		//if not found, string::npos is returned
		{
			cout << "Appointment Found!" << endl; 
			cout << "Please select the date: YY/MM/DD\n";
			cin >> date;
			a.date = date;
			cout << "Please select the time: HH:MM A(P)M\n";
			cin >> time;
			a.time = time;
			cout << "Please state the reason for your appointment:\n";
			cin >> reason;
			a.reason = reason;
			//Check for conflicts in the schedule with new date and time. 
			sch << "\n" << a.id << "\t" << a.date << "\t" << a.time << "\t" << a.reason << endl;
			cout << "Appointment Updated." << endl; 
			sch.close(); 
		}
	}

}

void Appointment::view()
{
}

void Appointment::setTech(string t)
{
	tech = t;
}

void Appointment::accept(User * u, Schedule * s)
{
	string ID;

	cout << "Please enter the ID of the appointment you want to accept";
	cin >> ID;

	vector<Appointment *>::iterator iter;
	for (iter = s->getSchedule().begin(); iter != s->getSchedule().end(); iter++)
	{
		if ((*iter)->getID().compare(ID) == 0)
		{
			(*iter)->setTech(u->getUsername());
			break;
		}
	}

	if (iter == s->getSchedule().end())
	{
		cout << "Appointment not found!";
	}

}

string Appointment::getReason()
{
	return reason;
}

string Appointment::getTime()
{
	return time;
}

string Appointment::getDate()
{
	return date;
}

string Appointment::getID()
{
	return id;
}

string Appointment::getTech()
{
	return tech;
}
