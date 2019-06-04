<?php 
	require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');

	$reset1 = "DROP TABLE family;";
	$reset2 = "DROP TABLE parents CASCADE;";
	$reset3 = "DROP TABLE players CASCADE;";
	$reset4 = "CREATE TABLE public.parents (parent_id SERIAL PRIMARY KEY, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL);"; 

	$reset5 = "INSERT INTO parents (first_name, last_name) VALUES ('Jonathan', 'Carlson'), ('Shannon', 'Carlson'), ('Lesa', 'Crabtree'), ('Angel', 'Little'), ('Grady', 'Little'), ('Sidra', 'Hawkins'), ('Katherine', 'Madden'), ('James', 'Madden'), ('Stefanie', 'Norris'), ('Melissa', 'Shepherd'), ('Jennifer', 'Fidler'), ('Ken', 'Fidler'), ('Thea', 'Perkins'), ('Casey', 'Perkins'), ('April', 'Lumsdin'), ('Valerie', 'Porter');";
	$reset6 = "CREATE TABLE public.players (player_id SERIAL PRIMARY KEY, derby_name VARCHAR(100) NOT NULL UNIQUE, first_name VARCHAR(100), last_name VARCHAR(100), bio text, derby_number int NOT NULL UNIQUE, age INT);";

	$reset7 = "INSERT INTO players (derby_name, first_name, last_name, bio, derby_number, age) VALUES ('Ellagator', 'Elinor', 'Carlson', 'Ellagator will chomp you up!', 62, 13), ('Bad Luck', 'Kourtney', 'Crabtree', 'Enter catch phrase here', 130, 9), ('BB Gunn', 'Bianca', 'Little', 'Enter catch phrase here', 9, 13), ('Brinagade', 'Brina', 'Norris', 'Enter catch phrase here', 24, 11), ('Coco Loco', 'Toccara', 'Hawkins', 'Enter catch phrase here', 21, 10), ('Cora L. Snake', 'Ruby Jane', 'Shepherd', 'Enter catch phrase here', 911, 16), ('Crazy Daisy', 'Daisy', 'Madden', 'Enter catch phrase here', 10, 9), ('Daddys Lil Monster', 'Brianna', 'Fidler', 'Enter catch phrase here', 2, 9), ('Dynamite', 'Daena', 'Perkins', 'Enter catch phrase here', 123, 13), ('Fire Cracker', 'Evelyn', 'Lumsden', 'Enter catch phrase here', 42, 9), ('Evi-DENTS', 'Evi', 'Jones', 'Enter catch phrase here', 910, 17);";

	$reset8 = "CREATE TABLE public.family (family_id SERIAL PRIMARY KEY, player_id INT NOT NULL REFERENCES public.players(player_id), mother INT NOT NULL REFERENCES public.parents(parent_id), father INT REFERENCES public.parents(parent_id), balance_owed int NOT NULL);"; 

	$reset9 = "INSERT INTO family (player_id, mother, father, balance_owed) VALUES (1, 1, 2, 0), (2, 16, NULL, 280), (3, 3, 4, 280), (4, 8, NULL, 24), (5, 5, NULL, 123), (6, 9, NULL, 999), (7, 6, 7, 654), (8, 10, 11, 456), (9, 12, 13, 111), (10, 14, NULL, 55), (11, 15, NULL, 1);";

	$somelist = array($reset1, $reset2, $reset3, $reset4, $reset5, $reset6, $reset7, $reset8, $reset9);

	foreach($somelist as $line) {
		$statement = $db->prepare($line);
		$statement->execute();
	}	
    
    header("Location: prove06.php");
    die();
?>