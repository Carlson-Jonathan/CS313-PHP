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
	player_id SERIAL NOT NULL PRIMARY KEY,		
	derby_name VARCHAR(100) NOT NULL UNIQUE,
	first_name VARCHAR(100),
	last_name VARCHAR(100),
	bio text,
    derby_number int NOT NULL UNIQUE,
	age INT
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
CREATE TABLE public.parents (
	parent_id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL
);

INSERT INTO parents VALUES (1, 'Jonathan', 'Carlson');
INSERT INTO parents VALUES (2, 'Shannon', 'Carlson');
INSERT INTO parents VALUES (16, 'Lesa', 'Crabtree');
INSERT INTO parents VALUES (3, 'Angel', 'Little');
INSERT INTO parents VALUES (4, 'Grady', 'Little');
INSERT INTO parents VALUES (5, 'Sidra', 'Hawkins');
INSERT INTO parents VALUES (6, 'Katherine', 'Madden');
INSERT INTO parents VALUES (7, 'James', 'Madden');
INSERT INTO parents VALUES (8, 'Stefanie', 'Norris');
INSERT INTO parents VALUES (9, 'Melissa', 'Shepherd');
INSERT INTO parents VALUES (10, 'Jennifer', 'Fidler');
INSERT INTO parents VALUES (11, 'Ken', 'Fidler');
INSERT INTO parents VALUES (12, 'Thea', 'Perkins');
INSERT INTO parents VALUES (13, 'Casey', 'Perkins');
INSERT INTO parents VALUES (14, 'April', 'Lumsdin');
INSERT INTO parents VALUES (15, 'Valerie', 'Porter');

/******************************************************************************
* LOGIN table
* This table represents an account that the user of website can create setting
* up a private username and password. 
******************************************************************************/
CREATE TABLE public.login (
	ID SERIAL NOT NULL PRIMARY KEY,
	user_name VARCHAR(100) NOT NULL UNIQUE,
	user_password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	parent_id INT NOT NULL REFERENCES public.parents(parent_id)
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
	roster_id SERIAL NOT NULL PRIMARY KEY,
	player_id INT NOT NULL REFERENCES public.players(player_id)
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
    family_id SERIAL NOT NULL PRIMARY KEY,
    player_id INT NOT NULL REFERENCES public.players(player_id),
    mother INT NOT NULL REFERENCES public.parents(parent_id),
    father INT REFERENCES public.parents(parent_id),
    balance_owed int NOT NULL
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


SELECT players.derby_name, parents.first_name, parent1.first_name FROM parents, parents AS parent1, players, family
WHERE players.player_id = family.player_id AND mother = parent1.parent_id AND father = parents.parent_id;

-- Delete all test data (data that is inserted)

DELETE FROM family
WHERE family_id > 9;

DELETE FROM players
WHERE player_id > 11;

DELETE FROM parents
WHERE parent_id > 16;

-- Call test tables
SELECT * FROM players;
SELECT * FROM parents;
SELECT * FROM family;



