--i hope this works
create database CriticalMiss;

create table Users (
	userid integer unsigned auto_increment not null,
	hash varchar(255) not null,
	username varchar(31) not null,
	pointer varchar(6) not null,
	picture varchar(255) not null,
	primary key(userid)
);

create table Rooms (
	roomid integer unsigned auto_increment not null,
	roomname varchar(31) not null,
	owner integer unsigned not null,
	keyphrase varchar(31) not null,
	capacity smallint not null,
	primary key(roomid),
	foreign key(owner) references Users(userid)
);

create table Characters (
	userid integer unsigned not null,
	roomid integer unsigned not null,
	ypoint integer not null,
	xpoint integer not null,
	picture varchar(255) not null,
	primary key(userid, roomid),
	foreign key(userid) references Users(userid),
	foreign key(roomid) references Rooms(roomid)
);

create table Boardimages (
	imageid integer unsigned auto_increment not null,
	roomid integer unsigned not null,
	owner integer unsigned not null,
	stack_order integer not null,
	x integer not null,
	y integer not null,
	ground bit not null,
	picture varchar(255) not null,
	primary key(imageid),
	foreign key(owner) references Users(userid),
	foreign key(roomid) references Rooms(roomid)	
);

create table Messages (
	messageid integer unsigned auto_increment not null,
	roomid integer unsigned not null,
	userid integer unsigned not null,
	alias varchar(31) not null,
	send_date datetime not null,
	blurb text not null,
	primary key(messageid),
	foreign key(userid) references Users(userid),
	foreign key(roomid) references Rooms(roomid)
);

create table Aliases (
	aliasid integer unsigned auto_increment not null,
	displayname varchar(31) not null,
	textcolour varchar(6) not null,
	roomid integer unsigned not null,
	owner integer unsigned not null,
	primary key(aliasid),
	foreign key(owner) references Users(userid),
	foreign key(roomid) references Rooms(roomid)
);

create table Notes (
	noteid integer unsigned auto_increment not null,
	title varchar(31) not null,
	private bit not null,
	blurb text not null,
	roomid integer unsigned not null,
	owner integer unsigned not null,
	primary key(noteid),
	foreign key(owner) references Users(userid),
	foreign key(roomid) references Rooms(roomid)
);

create table Images (
	userid integer unsigned not null,
	image varchar(255) not null,
	primary key(userid, image),
	foreign key(userid) references Users(userid)
)



