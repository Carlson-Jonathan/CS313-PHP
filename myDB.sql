/******************************************************************************
* Author:
*   Jonathan Carlson
* Description:
*   Ponder04 Assignment. This assignment is to familiarize students with the 
*   basics of postgreSQL database tables and key relationships. This particular
*   file establishes some basic data of my daughter's roller derby team, the
*   Rocket City Rebels.    
******************************************************************************/

/******************************************************************************
* PLAYERS table
* This table will contain the game name, real names, age, and some scripted 
* information about each player on the Rocket City Rebels rollerderby team. 
* This table is a "many-to-one" that links to no other tables.
******************************************************************************/
CREATE TABLE public.players (
	ID SERIAL NOT NULL PRIMARY KEY,		
	playername VARCHAR(100) NOT NULL UNIQUE,
	realfirstname VARCHAR(100) NOT NULL,
	reallastname VARCHAR(100) NOT NULL,
	bio text,
    playernumber int NOT NULL,
	age INT NOT NULL
);

INSERT INTO players VALUES(1, 'Ellagator', 'Elinor', 'Carlson', 
                            'Ellagator will chomp you up!',
                            62, 13);

INSERT INTO players VALUES(2, 'Bad Luck', 'Kourtney', 'Crabtree',
                            'Enter catch phrase here',
                            130, 9);

INSERT INTO players VALUES(3, 'BB Gunn', 'Bianca', 'Little',
                            'Enter catch phrase here',
                            9, 13);

INSERT INTO players VALUES(4, 'Brinagade', 'Brina', 'Norris',
                            'Enter catch phrase here',
                            24, 11); 

INSERT INTO players VALUES(5, 'Coco Loco', 'Toccara', 'Hawkins',
                            'Enter catch phrase here',
                            21, 10);

INSERT INTO players VALUES(6, 'Cora L. Snake', 'Ruby Jane', 'Shepherd',
                            'Enter catch phrase here',
                            911, 16);

INSERT INTO players VALUES(7, 'Crazy Daisy', 'Daisy', 'Madden',
                            'Enter catch phrase here', 10, 9);

INSERT INTO players VALUES(8, 'Daddys Lil Monster', 'Brianna', 'Fidler',
                            'Enter catch phrase here', 
                            2, 9);

INSERT INTO players VALUES(9, 'Dynamite', 'Daena', 'Perkins',
                            'Enter catch phrase here',
                            123, 13);

INSERT INTO players VALUES(10, 'Fire Cracker', 'Evelyn', 'Lumsden',
                            'Enter catch phrase here',
                            42, 9); 

INSERT INTO players VALUES(11, 'Evi-DENTS', 'Evi', 'Jones',
                            'Enter catch phrase here',
                            910, 17);

/******************************************************************************
* PARENT table
* This table represents the parents of the players, giving their names, any
* monthly dues they may still owe to the team, and a foreign key linking to 
* the player they are the parent of. 
******************************************************************************/
CREATE TABLE public.parent (
	ID SERIAL NOT NULL PRIMARY KEY,
	parentfirstname VARCHAR(100) NOT NULL,
	parentlastname VARCHAR(100) NOT NULL,
);

INSERT INTO parent VALUES (1, 'Jonathan', 'Carlson', 1);
INSERT INTO parent VALUES (2, 'Shannon', 'Carlson', 1);
INSERT INTO parent VALUES (16, 'Lesa', 'Crabtree', 2);
INSERT INTO parent VALUES (3, 'Angel', 'Little', 3);
INSERT INTO parent VALUES (4, 'Grady', 'Little', 3);
INSERT INTO parent VALUES (5, 'Sidra', 'Hawkins', 5);
INSERT INTO parent VALUES (6, 'Katherine', 'Madden', 7);
INSERT INTO parent VALUES (7, 'James', 'Madden', 7);
INSERT INTO parent VALUES (8, 'Stefanie', 'Norris', 4);
INSERT INTO parent VALUES (9, 'Melissa', 'Shepherd', 6);
INSERT INTO parent VALUES (10, 'Jennifer', 'Fidler', 8);
INSERT INTO parent VALUES (11, 'Ken', 'Fidler', 8);
INSERT INTO parent VALUES (12, 'Thea', 'Perkins', 9);
INSERT INTO parent VALUES (13, 'Casey', 'Perkins', 9);
INSERT INTO parent VALUES (14, 'April', 'Lumsdin', 10);
INSERT INTO parent VALUES (15, 'Valerie', 'Porter', 11);

/******************************************************************************
* LOGIN table
* This table represents an account that the user of website can create setting
* up a private username and password. 
******************************************************************************/
CREATE TABLE public.login (
	ID SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	userpassword VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	parent_ID INT NOT NULL REFERENCES public.parent(ID)
);

INSERT INTO login VALUES (1, 'Bumperpants', 'PleaseDontHackMyAccount!', 
                            'Ellas Dad', 1);

INSERT INTO login VALUES (2, 'PhotoHoney', 'Ilovemyhoney123456!@#$',
                            'Ellas Mom', 2);

/******************************************************************************
* ROSTER table
* This table represent the players who are on the roster to play in the next
* game. There are more players on the team than they can allow to play in any
* single game so they select the best performers only. The rest are benched.
******************************************************************************/
CREATE TABLE public.roster (
	ID SERIAL NOT NULL PRIMARY KEY,
	player_ID INT NOT NULL REFERENCES public.players(ID)
);	

INSERT INTO roster VALUES(1, 1);
INSERT INTO roster VALUES(2, 3);
INSERT INTO roster VALUES(3, 5);
INSERT INTO roster VALUES(4, 7);
INSERT INTO roster VALUES(5, 9);
INSERT INTO roster VALUES(6, 11);

/******************************************************************************
* FAMILY table
* This table organizes the parents and players into their respective families
* and shows if they owe any dues.
******************************************************************************/
CREATE TABLE public.family (
    ID SERIAL NOT NULL PRIMARY KEY,
    player_ID INT NOT NULL REFERENCES public.players(ID),
    mother INT REFERENCES public.parent(ID),
    father INT REFERENCES public.parent(ID),
    balanceowed int
);

INSERT INTO family VALUES(1, 1, 1, 2, 0);
INSERT INTO family VALUES(2, 2, 16, NULL, 280);
INSERT INTO family VALUES(3, 3, 3, 4, 280);
INSERT INTO family VALUES(4, 4, 8, NULL, 24);
INSERT INTO family VALUES(5, 5, 5, NULL, 123);
INSERT INTO family VALUES(6, 6, 9, NULL, 999);
INSERT INTO family VALUES(7, 7, 6, 7, 654);
INSERT INTO family VALUES(8, 8, 10, 11, 456);
INSERT INTO family VALUES(9, 9, 12, 13, 111);
INSERT INTO family VALUES(10, 10, 14, NULL, 55);
INSERT INTO family VALUES(11, 11, 15, NULL, 1);

/******************************************************************************
* Some test selections to see if it works:
******************************************************************************/
--Displays the names of the parents of the players on the roster.
SELECT parent.parentfirstname, parent.parentlastname FROM parent
INNER JOIN players
ON parent.player_ID = players.ID
INNER JOIN roster
ON players.ID = roster.player_ID;

--Display the parents and the players that belong to them
SELECT parent.parentfirstname, parent.parentlastname, players.realfirstname, 
players.reallastname, players.playername FROM players
INNER JOIN parent
ON players.ID = parent.player_ID;

SELECT parent.parentfirstname, FROM parent
INNERJOIN players
ON family.player_ID = parent.


SELECT players.playername, parent.parentfirstname, parent1.parentfirstname FROM parent, parent AS parent1, players, family
WHERE players.ID = family.player_ID AND mother = parent1.id AND father = parent.id;




