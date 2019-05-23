<?php session_start(); ?>

<!DOCTYPE HTML>  
<html>

<head>
</head>

<body>  

    <?php
    /***************************************************************************************************
    * This assignment demonstrates how to use an HTML form and PHP code to access a database and display
    * extrated information back to the user. Here, the user enters the name of a book in the 
    * scriptures and the database is scanned for that book. A specific chapter and verse is dispalyed
    * back to the user if the book is found to be in the database.
    ***************************************************************************************************/

        include($_SERVER['DOCUMENT_ROOT'].'/scripts/postgresqlsetup.php');
        echo "<br><br><br>";
        
        // define variables and set to empty values
        $book = $booksearch = $chapter = $verse = $content = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Extracts the user input value and saves as a variable on input 'submit' click.
            $booksearch = $_POST["booksearch"];
        }
    ?>

    <!-- For this particular assignment, no form action is required-->
    <form method="post">  
        Search Database For Book: <input type="text" name="booksearch"><br><br>
        <input type="submit" name="submit" value="Search"> 
    </form>

    <?php
        // Watch your syntax here very carefully, especially when it comes to quotation marks!
        $statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures WHERE book = '" . $booksearch . "';");
        $statement->execute();
        
        // Loop through the database rows and set each column item to a variable.
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["book"] = $row['book'];
            $_SESSION["chapter"] = $row['chapter'];
            $_SESSION["verse"] = $row['verse'];
            $_SESSION["content"] = $row['content'];

            // Since it is in a loop, this will display multiple results if found.
            echo "<p><strong>$_SESSION['book'] $_SESSION['chapter']:$_SESSION['verse']</strong> - <a href='content.php'>See Scripture</a><p>";
        }
    ?>

</body>
</html>
