<!----------------------------------------------------------------------------- 
- "insert.php"
- Author:
-     Jonathan Carlson
- Decription
-     The purpose of this page is to insert database lines that the user 
-     inputs. After updating the database, the page redirect back to the 
-     original insert page so the user never actually sees what is going on 
-     here.
------------------------------------------------------------------------------>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../../styles/prove06.css">
</head>
<body>
    <?php
        require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');
        
        $dname = $_POST['dname'];
        $dnumber = $_POST['dnumber'];
        $pfname = $_POST['pfname'];
        $plname = $_POST['plname'];
        $balance = $_POST['balance'];

        echo $dname . " " . $dnumber . " " . $pfname . " " . 
        $plname . " " . " $" . $balance;

        try {
            // The colons in the values secion are placeholders. You
            // could technically use $ for the variables, but they 
            // would show up in your address bar, allowing the user
            // to insert text, which could result in an attack.
            $updateplayers = 'INSERT INTO players(derby_name, derby_number) 
            VALUES(:dname, :dnumber);';        
            
            $updateparents = 'INSERT INTO parents(first_name, last_name) 
            VALUES(:pfname, :plname);';   

            $updatefamily = 'INSERT INTO family(player_id, mother, balance_owed) 
            VALUES(:player_id, :parent_id, :balance);';

            $getplayerid = 'SELECT player_id FROM players WHERE derby_name = \'' . $dname . '\';';    

            $getparentid = 'SELECT parent_id FROM parents WHERE first_name = \'' . $pfname . '\' AND last_name = \'' . $plname . '\';';

            echo "<br><br>" . $getplayerid . "<br>" . $getparentid . "<br>";

            // Insert new player into players table
            $statement1 = $db->prepare($updateplayers);
            // Because we used colons instead of $ in the VALUEs
            // above, we must bind the placeholders (colon values) to 
            // their associated variables.
            $statement1->bindValue(':dname', $dname);
            $statement1->bindValue(':dnumber', $dnumber);
            $statement1->execute();
            
            // Extract new player serial id from inserted player
            $setplayerid = $db->prepare($getplayerid);
            $setplayerid->execute();
            while ($row = $setplayerid->fetch(PDO::FETCH_ASSOC)) {
                $player_id = $row['player_id'];
            }

            // Insert new parent into parents table
            $statement2 = $db->prepare($updateparents);
            $statement2->bindValue(':pfname', $pfname);
            $statement2->bindValue(':plname', $plname);
            $statement2->execute();

            // Extract new parent serial id from inserted player
            $setparentid = $db->prepare($getparentid);
            $setparentid->execute();
            while ($row = $setparentid->fetch(PDO::FETCH_ASSOC)) {
                $parent_id = $row['parent_id'];
            }            

            echo "<br>Player ID: " . $player_id . "<br>";
            echo "Parent ID: " . $parent_id;

            $statement3 = $db->prepare($updatefamily);
            $statement3->bindValue(':player_id', $player_id);
            $statement3->bindValue(':parent_id', $parent_id);
            $statement3->bindValue(':balance', $balance);
            $statement3->execute();
        }
        catch (PDOException $ex) {
            print "<p>error: $ex->getMessage() </p>\n\n";
            die();          
        }

        // Redirect to previous page without displaying this one.
        header("Location: prove06.php");
        die();
    ?>
</body>
</html>