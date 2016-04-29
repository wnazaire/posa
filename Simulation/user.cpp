#include "user.h"

int User::count = 0;

User::User(string, string, string, string)
{
	count++;
}

User::User(string, string, string)
{
	ID = to_string(count);
	count++;
}

string User::getPassword()
{
	return string();
}

string User::getName()
{
	return string();
}

string User::getUsername()
{
	return string();
}

string User::getPrivilege()
{
	return string();
}
