<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="Teach04" content="width=device-width, initial-scale=1">
        <title>CS313 Jonathan Carlson</title>
        <meta name = "description" content="CS313 Assignments for Jonathan Carlson.">
        <link rel="stylesheet" href="normalize.css">
        <link id="styles" rel="stylesheet" href="teach05.css">
    </head>
    
    <header>
    </header>
    
    <body>
    
        
        <?php
            $user = 'postgres';
            $password = 'password';
        
            $dbUrl = getenv('DATABASE_URL');

            if (empty($dbUrl)) {
                $dbUrl = "postgres://postgres:password@localhost:5432/mytestdb";
            }

            $dbopts = parse_url($dbUrl);

            print "<p>$dbUrl</p>\n\n";

            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');

            print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

            try {
             $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            }
            catch (PDOException $ex) {
             print "<p>error: $ex->getMessage() </p>\n\n";
             die();
            }

            /*
                Below calls the database info and displays it using PHP/CSS
            */
            
            foreach ($db->query('SELECT now()') as $row)
            {
             print "<br><p>$row[0]</p>\n\n<br><br>";
            }
 
            foreach ($db->query("SELECT * FROM players WHERE id='7' or id='9';") as $row)
            {
                $pn = $row['playername'];  
                $fn = $row['realfirstname'];
                $ln = $row['reallastname'];   
                $bio = $row['bio'];
                $age = $row['age'];
                $num = $row['playernumber'];    
                    
                echo "<p>Player Name: </p><e>$pn</e>" . 
                   "<p>First Name: </p><e>$fn</e>" .        
                   "<p>Last Name: </p><e>$ln</e>" .
                   "<p>Catch Phrase: </p><e>$bio</e>" .
                   "<p>Age: </p><e>$age</e>" . 
                   "<p>Number: </p><e>$num</e><br>" . 
                   "<p class='line'></p>";
            }
        
            echo $db->query("SELECT parentfirstname FROM parent;");
            //echo $parents[0];
            
  
        ?>
             
    </body>
        
    <footer>
    </footer>
    
</html>
