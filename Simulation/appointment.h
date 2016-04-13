#ifndef		APPT_H
#define		APPT_H

#include    <string>
using namespace std;

class Appointment
{
	public:
		void create();
		void edit();
		void view();
		void accept();
	private:
		string reason;
		string date;
		string time;
};

#endif