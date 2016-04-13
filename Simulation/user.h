#ifndef		USER_H
#define		USER_H

#include    <string>
using namespace std;

class User
{
	public:
		void create();
		string getPassword();
		string getName();
		string getUsername();
		int getPriviledge();
	private:
		string name;
		string password;
		int priviledge;
		string username;
};

#endif