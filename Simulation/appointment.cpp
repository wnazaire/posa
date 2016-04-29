#include "appointment.h"
#include "user.h"
#include "schedule.h"
#include <iostream>
#include <fstream>
#include <string.h>
using namespace std;

int Appointment::count = 0;

Appointment::Appointment(string r, string d, string t, string i)
{
	reason = r;
	date = d;
	time = t;
	id = i;
	count++;
}

Appointment::Appointment(string r, string d, string t)
{
	reason = r;
	date = d;
	time = t;
	id = to_string(count);
	count++;
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
