#ifndef		APPT_H
#define		APPT_H

#include    <string>
#include	"user.h"
using namespace std;

class Appointment
{
	public:
		Appointment(string, string, string, string);
		void create(User *);
		void edit();
		void view();
		void accept();
		string getReason();
		string getTime();
		string getDate();
		string getID();
	private:
		string reason;
		string date;
		string time;
		string id;
};

#endif