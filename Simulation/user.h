#ifndef		USER_H
#define		USER_H

#include    <string>
using namespace std;

class User
{
	public:
		User(string, string, string, string);
		string getPassword();
		string getName();
		string getUsername();
		string getPrivilege();
	private:
		string name;
		string password;
		string privilege;
		string username;
		int ID;
		static int count;
};

#endif