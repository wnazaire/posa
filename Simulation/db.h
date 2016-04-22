#ifndef		DB_H
#define		DB_H


#include	<iostream>
#include	<vector>
#include	"user.h"
using namespace std;

class DB
{
	public:
		vector<User *> users;
};

#endif