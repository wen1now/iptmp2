--i hope this works
create database CriticalMiss;

create table Users (
	userid unsigned integer auto_increment not null,
	hash varchar(255) not null,
	username varchar(31) not null,
	pointer varchar(6) not null,
	picture varchar(255) not null,
	primary key (userid)
);

create table Rooms (
	roomid unsigned integer auto_increment not null,
	roomname varchar(31) not null,
	owner integer not null,
	key varchar(31) not null,
	capacity smallint not null,
	primary key (roomid),
	foreign key (owner) references Users(userid)
);

create table Characters (
	userid unsigned integer not null,
	roomid unsigned integer not null,
	ypoint integer not null,
	xpoint integer not null,
	picture varchar(255) not null,
	primary key (userid, roomid),
	foreign key (userid) references Users(userid),
	foreign key (roomid) references Rooms(roomid)
);

create table Boards (
	imageid unsigned integer not null,
	roomid unsigned integer not null,
	owner unsigned integer not null,
	stack_order integer not null,
	x integer not null,
	y integer not null,
	ground boolean not null,
	picture varchar(255) not null,
	primary key (imageid),
	foreign key (owner) references Users(userid),
	foreign key (roomid) references Rooms(roomid)	
);

create table Messages (
	messageid unsigned integer not null,
	roomid unsigned integer not null,
	userid unsigned integer not null,
	alias varchar(31) not null,
	send_date date not null,
	blurb varchar(255) not null,
	primary key (messageid),
	foreign key (userid) references Users(userid),
	foreign key (roomid) references Rooms(roomid)
);

create table Aliases (
	aliasid unsigned integer not null,
	displayname varchar(31) not null,
	textcolour varchar(6) not null,
	roomid unsigned integer not null,
	owner unsigned integer not null,
	primary key (aliasid),
	foreign key (owner) references Users(userid),
	foreign key (roomid) references Rooms(roomid)
);

create table Notes (
	noteid unsigned integer not null,
	title varchar(31) not null,
	private boolean not null,
	blurb text not null,
	roomid unsigned integer not null,
	owner unsigned integer not null,
	primary key (noteid),
	foreign key (owner) references Users(userid),
	foreign key (roomid) references Rooms(roomid)
);

create table Images (
	userid unsigned integer not null,
	image varchar(255) not null,
	primary key (userid, image),
	foreign key (userid) references Users(userid)
)
