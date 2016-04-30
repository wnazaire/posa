#ifndef		APPT_H
#define		APPT_H

#include    <string>
#include	"user.h"
using namespace std;

class Appointment
{
	public:
		Appointment(string, string, string, string, string, string);
		Appointment(string, string, string, string);
		void edit();
		void view();
		void accept(User *, Schedule *);
		void viewAppointments(User *);
		void setTech(string);
		string getReason();
		string getTech();
		string getCustomer();
		string getTime();
		string getDate();
		string getID();
	private:
		string reason;
		string date;
		string time;
		string id;
		string tech;
		string customer;
		static int count;
};

#endif