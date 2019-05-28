<!DOCTYPE HTML>  
<html>

<head>
    <link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../teach06/teach06.css">
</head>

<body>  

    <?php
    /***************************************************************************************************
    * This assignment demonstrates how to use an HTML form and PHP code to access a database and display
    * extrated information back to the user. Here, the user enters the name of a book in the 
    * scriptures and the database is scanned for that book. A specific chapter and verse is dispalyed
    * back to the user if the book is found to be in the database.
    ***************************************************************************************************/

        //Include needed files
        require($_SERVER['DOCUMENT_ROOT'].'/teamactivities/teach06/postgresqlsetup.php');
        require('content.php');
        //echo "<br><br><br>";
        
        // define variables and set to empty values
        $id = $book = $booksearch = $chapter = $verse = $content = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Extracts the user input value and saves as a variable on input 'submit' click.
            $booksearch = $_POST["booksearch"];
        }
    ?>

    <!-- For this particular assignment, no form action is required-->
    <form method="post">  
        <p>Search Database For Book: </p><input type="text" name="booksearch"><br><br>
        <input type="submit" name="submit" value="Search"> 
    </form>

    <?php
        // Watch your syntax here very carefully, especially when it comes to quotation marks!
        $statement = $db->prepare("SELECT id, book, chapter, verse, content FROM scriptures WHERE book = '" . $booksearch . "';");
        $statement->execute();
        
        // Loop through the database rows and set each column item to a variable.
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $book = $row['book'];
            $chapter = $row['chapter'];
            $verse = $row['verse'];
            $content = $row['content'];

            // Since it is in a loop, this will display multiple results if found.
            // This sends the 'scripture_id' to the next page so it knows where to query from
            echo "<p><strong>" . $book . " " . $chapter . ":" . $verse . "</strong> - <a href='content.php?scripture_id=$id'>See Scripture</a><p>";
        }
    ?>

</body>
</html>
