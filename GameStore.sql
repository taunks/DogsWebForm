 #select * from games g join consoles c on g.consoleID = c.consoleID;


drop database if exists NintendoGameStore;
 
create database NintendoGameStore;
use NintendoGameStore;
 
create table users (
    user_id int unsigned not null auto_increment,
    first_name varchar(20) not null,
    last_name varchar(40) not null,
    email varchar(60) not null,
    pass char(40) not null,
    registration_date datetime not null,
    primary key (user_id)
) engine = innodb;

create table consoles (
    consoleID int unsigned not null auto_increment,
    console_name varchar(40) not null,
    rel_date date not null,
    price decimal(10,2) not null,
    primary key (consoleID)
) engine = innodb;

create table games (
    gameID int unsigned not null auto_increment,
    game_title varchar(60) not null,
    rel_date year not null,
    price decimal(10,2) not null,
    consoleID int unsigned not null,
    rating varchar(15) not null,
    genre varchar(20) not null,
    primary key (gameID),
    foreign key (consoleID) references consoles (consoleID)
) engine = innodb;
 

insert into users
    (first_name, last_name, email,              pass,       registration_date) values
    ('Jen',     'Hathaway', 'taunks@gmail.com', 'jhathaway', '2016-03-20')
;

insert into consoles
    (console_name, rel_date, price) values
    ('NES',     '1985-10-18', '85.00'),
    ('SNES',    '1991-08-23', '75.00'),
    ('N64',     '1996-09-29', '63.00'),
    ('Gamecube','2001-11-18', '55.00'),
    ('Wii',     '2006-11-19', '145.00'),
    ('Wii U',   '2012-11-18', '350.00')
;

insert into games
    (game_title,                    rel_date, price, consoleID,   rating,     genre) values
    ('Legend of Zelda',             '1986', '30.00', '1',     	'Everyone', 'RPG'),
    ('Super Mario Bros.',           '1985', '20.00', '1',     	'Everyone', 'Action/Adventure'),
    ('Contra',                      '1988', '43.00', '1',     	'Teen',     'Action/Adventure'),
    ('Duck Tales',                  '1989', '20.00', '1',     	'Everyone', 'Action/Adventure'),
    ('Castlevania',                 '1987', '22.00', '1',     	'Teen',     'Action/Adventure'),
    ('Duck Hunt',                   '1985', '5.00',  '1',     	'Everyone', 'Shooter'),
    ('Clay Fighter',                '1993', '12.00', '2',   	'Teen',     'Fighting'),
    ('Super Mario Kart',            '1992', '34.00', '2',    	'Everyone', 'Racing'),
    ('Battletoads & Double Dragon', '1993', '38.00', '2',    	'Everyone', 'Action/Adventure'),
    ('Mario Party 3',               '2000', '74.00', '3',     	'Everyone', 'Family'),
    ('Cruis''n USA',                '1994', '9.00',  '3',     	'Everyone', 'Racing'),
    ('Crazy Taxi',                  '1999', '10.00', '4',		'Teen',     'Racing'),
    ('Lost Kingdoms',               '2002', '27.00', '4',		'Teen',     'RPG'),
    ('Animal Crossing',             '2001', '20.00', '5',     	'Everyone', 'Action/Adventure'),
    ('Donkey Kong Country Returns', '2010', '20.00', '5',     	'Everyone', 'Action/Adventure'),
    ('Super Mario Maker',           '2015', '58.00', '6',   	'Everyone', 'Action/Adventure'),
    ('Yoshi''s Woolly World',       '2015', '49.00', '6',   	'Everyone', 'Action/Adventure')
;