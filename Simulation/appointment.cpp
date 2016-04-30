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

void Appointment::edit()
{
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
