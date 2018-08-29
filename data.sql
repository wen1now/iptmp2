insert into users( hash, username, pointer, picture) 
values ('password', 'BillyBob', '0000ff', 'default.jpg' ), 
('letmein', 'Jimbro', 'ff0000', 'default.jpg'),
('1234', 'BarryBBenson', '00ff00', 'default.jpg'),
('hello', 'PineappleOnPizza', 'ffffff', 'default.jpg');

insert into rooms( roomname, owner, keyphrase, capacity)
values ('nokey', '1', '', '4'),
('nonoobs', '2', 'notanoob','5'),
('noobsonly','3','amnoob','6');

insert into characters( userid, roomid, ypoint, xpoint, picture)
values ('1','1','0','0','default.jpg'),
('2','2','0','0','default.jpg'),
('3','3','0','0','default.jpg'),
('1','2','0','0','default.jpg'),
('3','1','0','0','default.jpg');