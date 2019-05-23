<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="Teach05" content="width=device-width, initial-scale=1">
        <title>CS313 Teach05 Team1</title>
        <meta name = "description" content="CS313 Teach05 Team 1">
        <link rel="stylesheet" href="normalize.css">
        <link id="styles" rel="stylesheet" href="teach05.css">
    </head>
    
    <header>
    </header>
    
    <body>
     
        <?php
            include($_SERVER['DOCUMENT_ROOT'].'/scripts/postgresqlsetup.php');
            echo "<br><br>";
        
            $name = $email = $gender = $comment = $website = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $book = htmlspecialchars($_POST["book"]));
                $chapter = htmlspecialchars($_POST["chapter"]));
                $verse = htmlspecialchars($_POST["verse"]));
                $content = htmlspecialchars($_POST["content"]));
            }



        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Book</p><input name="book" type="text">
            <p>Chapter</p><input name="chapter" type="text">
            <p>Verse</p><input name="verse" type="text">
            <p>Content</p><input name="content" type="text">
            <input type="submit" name="submit" value="submit">
        </form>

            


        <?php

            /*
            // This works but is generally considered bad practice because you can end up pulling
            // more information that you need or want.
            foreach ($db->query("SELECT * FROM scriptures;") as $row)
            {
                $id = $row['id'];
                $book = $row['book'];  
                $chapter = $row['chapter'];   
                $verse = $row['verse'];
                $content = $row['content'];
                    
                echo "<br><br><p>$book" . " " .
                   "$chapter" . ":" .       
                   "$verse" . " - " .
                   "$content</p>";
            }
            */

            /* Prepared Statements:
                1.) Reduce parsing time  
                2.) Minimizes bandwith
                3.) Useful against SQL injection attacks
            

            // This parses, compiles, and optimizes data without executing in preperation for use.
            // This is a good practice technique because a loop is inefficient and can cause errors.
            $statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
            // This binds the selected values to the parameters. May execute multiple times with different values.
            $statement->execute();


            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $book = $row['book'];
                $chapter = $row['chapter'];
                $verse = $row['verse'];
                $content = $row['content'];
                echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            */
            
        ?>
        
    </body>
        
    <footer>
    </footer>
    
</html>