#include "appointment.h"
#include "user.h"
#include "schedule.h"
#include <iostream>
#include <fstream>
#include <string.h>
using namespace std;

User u;
string date;
Appointment a;
string time;
string reason;

Appointment::Appointment(string, string, string, string)
{
}

void Appointment::create(User *)
{
	ofstream sch;
	sch.open("schedule.txt");

	cout << "Please select the date: YY/MM/DD\n";
	cin >> date;
	a.date = date;
	cout << "Please select the time: HH:MM A(P)M\n";
	cin >> time;
	a.time = time;
	cout << "Please state the reason for your appointment:\n";
	cin >> reason;
	a.reason = reason;
	a.id = u.getName();
	sch << "\n" << a.id << "\t" << a.date << "\t" << a.time << "\t" << a.reason << endl;
	// Check if date and time are available
	cout << "Appointment created!" << endl;
	sch.close();
	/* Check if date and time are not available
	cout << "There is an error! Please try again";
	// Return to check options
	*/
}

void Appointment::edit()
{
}

void Appointment::view()
{
}

void Appointment::accept()
{
}

string Appointment::getReason()
{
	return string();
}

string Appointment::getTime()
{
	return string();
}

string Appointment::getDate()
{
	return string();
}

string Appointment::getID()
{
	return string();
}
