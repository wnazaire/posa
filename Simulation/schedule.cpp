#include "schedule.h"

Schedule::Schedule()
{
}

void Schedule::add(Appointment *)
{
}

void Schedule::viewUsersAppointments(User *)
{
}

void Schedule::viewAll(User * u)
{
	if (u->getPrivilege().compare("1") == 0)
	{
		cout << "Access denied";
	}
	else
	{
		cout << "**********************************************************************";
		for (vector <Appointment *>::iterator iter = schedule.begin(); iter != schedule.end(); iter++)
		{
			cout << "\t" << (*iter)->getCustomer() << "\t" << (*iter)->getID() << "\t" << (*iter)->getDate() << "\t" << (*iter)->getTime() << "\t" << (*iter)->getReason() << "\n";
		}
		cout << "**********************************************************************";
	}
}

vector<Appointment*> Schedule::getSchedule()
{
	return vector<Appointment*>();
}
