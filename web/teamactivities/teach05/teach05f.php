<?php
/* Prepared Statements:
    1.) Reduce parsing time  
    2.) Minimizes bandwith
    3.) Useful against SQL injection attacks
*/

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
    }
?>
