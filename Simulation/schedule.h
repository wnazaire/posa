#ifndef		SCHE_H
#define		SCHE_H

#include    <string>
#include	<iostream>
#include	<vector>
using namespace std;

class Schedule
{
	public:
		void viewUsersAppointments(User *);
		void viewAll(User &);
	private:
		vector<Appointment> shedule;
};

#endif