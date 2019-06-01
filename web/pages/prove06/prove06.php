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
            Jonathan Carlson - CS313 - Prove06<br>
            Rocket City Rebels Roller Derby Database
            <?php
                require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');
            ?> 
        </h1>
    </header>

    <main>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $player_id = $_SESSION['player_id'];
                $derby_name = $_POST["dname"];
                $derby_number = $_POST["dnumber"];
                $parent_id = $_SESSION['parent_id'];
                $pfname = $_POST["pfname"];
                $plname = $_POST["plname"];
                $balance = $_POST["balance"];
            }

            // Security
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>

        <?php
            $statement = $db->prepare("SELECT players.player_id, players.derby_name, players.derby_number, parents.parent_id, parents.first_name, parents.last_name, family.balance_owed FROM parents, players, family
                WHERE players.player_id = family.player_id AND mother = parents.parent_id;");
            $statement->execute();

            // Loop through the database rows and set each column item to a variable.
            
            echo "
                <table>
                    <tr>
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

                echo "
                    <tr>
                        <td><input type='submit' id='remove' value='Remove Player'></td>
                        <td>" . $_SESSION['derby_name'] . "</td>
                        <td>" . $_SESSION['derby_number'] . "</td>
                        <td>" . $_SESSION['parent_fn'] . " " . $_SESSION['parent_ln'] . "</td>
                        <form method='post'>
                            <td>$
                                <input type='number' value='" . $_SESSION['owing'] . "'>
                                <input type='submit' name='submitbalance' id='update' value='Update Balance'>
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
                <br><br><br><br>";

        ?>
        
    </main>
    
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
    </footer>
    

</body>
</html>
