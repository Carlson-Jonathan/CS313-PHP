\c teach05;
DROP DATABASE derby;
CREATE DATABASE derby;
\c derby;

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
	player_id SERIAL PRIMARY KEY,		
	derby_name VARCHAR(100) NOT NULL UNIQUE,
	first_name VARCHAR(100),
	last_name VARCHAR(100),
	bio text,
    derby_number int NOT NULL UNIQUE,
	age INT
);

INSERT INTO players (derby_name, first_name, last_name, bio, derby_number, age)
VALUES
('Ellagator', 'Elinor', 'Carlson', 'Ellagator will chomp you up!', 62, 13),
('Bad Luck', 'Kourtney', 'Crabtree', 'Enter catch phrase here', 130, 9),
('BB Gunn', 'Bianca', 'Little', 'Enter catch phrase here', 9, 13),
('Brinagade', 'Brina', 'Norris', 'Enter catch phrase here', 24, 11),
('Coco Loco', 'Toccara', 'Hawkins', 'Enter catch phrase here', 21, 10),
('Cora L. Snake', 'Ruby Jane', 'Shepherd', 'Enter catch phrase here', 911, 16),
('Crazy Daisy', 'Daisy', 'Madden', 'Enter catch phrase here', 10, 9),
('Daddys Lil Monster', 'Brianna', 'Fidler', 'Enter catch phrase here', 2, 9),
('Dynamite', 'Daena', 'Perkins', 'Enter catch phrase here', 123, 13),
('Fire Cracker', 'Evelyn', 'Lumsden', 'Enter catch phrase here', 42, 9),
('Evi-DENTS', 'Evi', 'Jones', 'Enter catch phrase here', 910, 17);

/******************************************************************************
* PARENT table
* This table represents the parents of the players, giving their names, any
* monthly dues they may still owe to the team, and a foreign key linking to 
* the player they are the parent of. 
******************************************************************************/
CREATE TABLE public.parents (
	parent_id SERIAL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL
);

INSERT INTO parents (first_name, last_name) VALUES
('Jonathan', 'Carlson'),
('Shannon', 'Carlson'),
('Lesa', 'Crabtree'),
('Angel', 'Little'),
('Grady', 'Little'),
('Sidra', 'Hawkins'),
('Katherine', 'Madden'),
('James', 'Madden'),
('Stefanie', 'Norris'),
('Melissa', 'Shepherd'),
('Jennifer', 'Fidler'),
('Ken', 'Fidler'),
('Thea', 'Perkins'),
('Casey', 'Perkins'),
('April', 'Lumsdin'),
('Valerie', 'Porter');

/******************************************************************************
* LOGIN table
* This table represents an account that the user of website can create setting
* up a private username and password. 
******************************************************************************/
CREATE TABLE public.login (
	ID SERIAL PRIMARY KEY,
	user_name VARCHAR(100) NOT NULL UNIQUE,
	user_password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	parent_id INT NOT NULL REFERENCES public.parents(parent_id)
);

INSERT INTO login (user_name, user_password, display_name, parent_id) VALUES 
('Bumperpants', 'PleaseDontHackMyAccount!', 'Ellas Dad', 1),
('PhotoHoney', 'Ilovemyhoney123456!@#$', 'Ellas Mom', 2);

/******************************************************************************
* ROSTER table
* This table represent the players who are on the roster to play in the next
* game. There are more players on the team than they can allow to play in any
* single game so they select the best performers only. The rest are benched.
******************************************************************************/
CREATE TABLE public.roster (
	roster_id SERIAL PRIMARY KEY,
	player_id INT NOT NULL REFERENCES public.players(player_id)
);	

INSERT INTO roster (roster_id, player_id) VALUES
(1, 1), (2, 3), (3, 5), (4, 7), (5, 9), (6, 11);

/******************************************************************************
* FAMILY table
* This table organizes the parents and players into their respective families
* and shows if they owe any dues.
******************************************************************************/
CREATE TABLE public.family (
    family_id SERIAL PRIMARY KEY,
    player_id INT NOT NULL REFERENCES public.players(player_id),
    mother INT NOT NULL REFERENCES public.parents(parent_id),
    father INT REFERENCES public.parents(parent_id),
    balance_owed int NOT NULL
);

INSERT INTO family (player_id, mother, father, balance_owed) VALUES
(1, 1, 2, 0), (2, 16, NULL, 280), (3, 3, 4, 280), 
(4, 8, NULL, 24), (5, 5, NULL, 123), (6, 9, NULL, 999), 
(7, 6, 7, 654), (8, 10, 11, 456), (9, 12, 13, 111),
(10, 14, NULL, 55), (11, 15, NULL, 1);

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



