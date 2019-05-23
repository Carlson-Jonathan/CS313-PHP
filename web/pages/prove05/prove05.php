<?php session_start(); ?>

<!DOCTYPE HTML>  
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="Prove05" content="width=device-width, initial-scale=1">
    <title>CS313 Prove 05 - Jonathan Carlson</title>
    <meta name = "description" content="PostgreSQL assignment for Jonathan Carlson.">
    <link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../../styles/prove05.css">
</head>

<body>  
    
    <header>
        <h1>
            Jonathan Carlson - CS313 - Prove05<br>Rocket City Rebels Roller Derby Database
            <?php
                // PostgreSQL-PHP setup document
                include($_SERVER['DOCUMENT_ROOT'].'/scripts/prove05setup.php');
            ?> 
        </h1>
    </header>

    <main>
        <?php
            // define variables and set to empty values
            $player_id = $playername = $realfirstname = $reallastname = $age = $bio = $playernumber = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $player_id = test_input($_POST["search"]);
            }

            // Security
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>

        <form method="post">  
            Search Database:<br>(enter player ID number 1-11)<br><input type="text" name="search"> 
            <input type="submit" name="submit" value="Search"> 
        </form>

        <?php
            $statement = $db->prepare("SELECT player_id, derby_name, first_name, last_name, age, bio, derby_number FROM players WHERE player_id = '" . $player_id . "';");
            $statement->execute();

            // Loop through the database rows and set each column item to a variable.
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['player_id'] = $row['player_id'];
                $_SESSION['derby_name'] = $row['derby_name'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['age'] = $row['age'];
                $_SESSION['derby_number'] = $row['derby_number'];
                $_SESSION['bio'] = $row['bio'];

                // Since it is in a loop, this will display multiple results if found.
                echo "<p><strong>Serial ID: </strong>" . $_SESSION['player_id'] . "<br><strong>Derby Name: </strong>" . $_SESSION['derby_name'] . "<br><strong>First Name: </strong>" . $_SESSION['first_name'] . "<br><strong>Last Name: </strong>" . $_SESSION['last_name'] . "<br><strong>Age: </strong>" . $_SESSION['age'] . "<br><strong>Derby Number: </strong>" . $_SESSION['derby_number'] . "<br><strong>Catch Phrase: </strong>" . $_SESSION['bio'] . "</p>";
            }
             
            $statement2 = $db->prepare("SELECT family.balance_owed, parents.first_name, parents.last_name FROM parents, players, family
            WHERE $player_id = family.player_id AND mother = parents.parent_id;");
            $statement2->execute();
                    
            while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['parent_fn'] = $row['first_name'];
                $_SESSION['parent_ln'] = $row['last_name'];
                $_SESSION['dues'] = $row['balance_owed'];
            }
            echo "<p><strong>Parent: </strong>" . $_SESSION['parent_fn'] . " " . $_SESSION['parent_ln'] . "</p>";  
            echo "<p><strong>Team Dues Owed: $</strong>" . $_SESSION['dues'] . "</p>";  
        ?>
    </main>
    
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
    </footer>
    

</body>
</html>
