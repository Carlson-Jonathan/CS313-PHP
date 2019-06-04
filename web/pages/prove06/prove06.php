<?php session_start(); ?>

<!DOCTYPE HTML>  
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="Prove06" content="width=device-width, initial-scale=1">
    <title>CS313 Prove 06 - Jonathan Carlson</title>
    <meta name = "description" content="Database assignment for Jonathan Carlson.">
    <link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../../styles/prove06.css">
</head>

<body>  
    
    <header>
        <h1>
            Jonathan Carlson - CS313 - Prove06:
            Rocket City Rebels Roller Derby Database
            <?php
                require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');
            ?> 
        </h1>
    </header>

    <main>
        <?php
            // Security
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $player_id = test_input($_SESSION['player_id']);
                $derby_name = test_input($_POST["dname"]);
                $derby_number = test_input($_POST["dnumber"]);
                $parent_id = test_input($_SESSION['parent_id']);
                $pfname = test_input($_POST["pfname"]);
                $plname = test($_POST["plname"]);
                $balance = test($_POST["balance"]);
            }
        ?>

        <form method="post" action="reset.php">
            <input type="submit" id="reset" value="Reset Database">
        </form>

        <?php
            $statement = $db->prepare("SELECT players.player_id, players.derby_name, players.derby_number, parents.parent_id, parents.first_name, parents.last_name, family.balance_owed FROM parents, players, family
                WHERE players.player_id = family.player_id AND mother = parents.parent_id ORDER BY player_id;");
            $statement->execute();

            // Loop through the database rows and set each column item to a variable.
            
            echo "
                <table>
                    <tr style='font-weight: 900; font-size: 1.3em; background-color: darkblue; color: yellow'>
                        <th>Action</th>
                        <th>Derby Name</th>
                        <th>Derby Number</th>
                        <th>Parent Name</th>
                        <th>Team Dues Owed</th>
                    </tr>
            ";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['player_id'] = $row['player_id'];
                $_SESSION['derby_name'] = $row['derby_name'];
                $_SESSION['derby_number'] = $row['derby_number'];
                $_SESSION['parent_id'] = $row['parent_id'];
                $_SESSION['parent_fn'] = $row['first_name'];
                $_SESSION['parent_ln'] = $row['last_name'];
                $_SESSION['owing'] = $row['balance_owed'];

                $confirm = "Are you sure you want to update this balance? (No Undo)";    
                echo "

                    <tr>
                        <form method='post' action='remove.php?player_id=" . $_SESSION['player_id'] . "'>
                            <td><input type='submit' id='remove' value='Remove Player'></td>
                        </form>
                        <td>" . $_SESSION['derby_name'] . "</td>
                        <td>" . $_SESSION['derby_number'] . "</td>
                        <td>" . $_SESSION['parent_fn'] . " " . $_SESSION['parent_ln'] . "</td>
                        <form method='post' action='updatebalance.php?player_id=" . $_SESSION['player_id'] . "'>    
                            <td>
                                <input type='number' name='balance' value='" . $_SESSION['owing'] . "'>
                                <input type='submit' name='submitbalance' id='update' onclick='return confirm(" . chr(34) . $confirm . chr(34) . ")' value='Update Balance'>
                            </td>
                        </form>
                    </tr>
                ";
            }
            
            // The Player inputs
            echo "
                <form method='post' action='insert.php'>
                    <tr>
                        <td><input type='submit' id='add' value='Add Player'></td>
                        <td><input type='text' name='dname' placeholder='Enter Derby Name'></td>
                        <td><input type='number' name='dnumber' placeholder='Derby #'></td>
                        <td><input type='text' name='pfname' placeholder='Parent First Name'>
                        <td>$<input type='number' name='balance' placeholder='Dues'></td>
                    </tr>
                        <tr><td></td><td></td><td></td>
                        <td><input type='text' name='plname' placeholder='Parent Last Name'></td>
                        <td></td>
                    </tr>
                </table>
                </form>
                <br><br>";

        ?>
        
    </main>
    
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
    </footer>
    

</body>
</html>
