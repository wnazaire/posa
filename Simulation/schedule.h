#ifndef		SCHE_H
#define		SCHE_H

#include    <string>
#include	<iostream>
#include	<vector>
#include	"appointment.h"
#include	"user.h"
using namespace std;

class Schedule
{
	public:
		Schedule();
		void add(Appointment *);
		void viewUsersAppointments(User *);
		void viewAll(User *);
		vector<Appointment *> getSchedule();
	private:
		vector<Appointment *> schedule;
};

#endif