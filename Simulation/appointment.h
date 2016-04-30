#ifndef		APPT_H
#define		APPT_H

#include    <string>
#include	"user.h"
using namespace std;

class Appointment
{
	public:
		Appointment(string, string, string, string, string);
		Appointment(string, string, string, string);
		void edit();
		void view();
		void accept();
		void viewAppointments(User *);
		string getReason();
		string getCustomer();
		string getTime();
		string getDate();
		string getID();
	private:
		string reason;
		string date;
		string time;
		string id;
		string customer;
		static int count;
};

#endif