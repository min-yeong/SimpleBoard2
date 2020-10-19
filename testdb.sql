CREATE TABLE testdb(
    UserNumber int primary key auto_increment,
    Title varchar(100) not null,
    Company varchar(30) not null,
    UserName varchar(30) not null,
    Id varchar(30) not null,
    Date datetime,
    Hit int not null default '0',
    Content varchar(100) not null
);
