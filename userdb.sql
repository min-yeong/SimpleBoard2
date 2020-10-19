CREATE TABLE usersdb(
	UserNumber int primary key auto_increment,
    Id varchar(30) not null,
	Password varchar(30) not null,
	UserName varchar(30) not null,
	Company varchar(30) not null
);