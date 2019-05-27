<!DOCTYPE HTML>  
<html>

<head>
</head>

<body>

    <?php
    	// Set up database for this page
    	require('postgresqlsetup.php');

    	// Pulls id from prior page link (see special syntax)
    	if(isset($_GET['scripture_id']));
    	$scripture_id = htmlspecialchars($_GET['scripture_id']);

    	// Exctract rows from database
        $statement1 = $db->prepare("SELECT book, chapter, verse, content FROM scriptures WHERE id = '" . $scripture_id . "';");
        $statement1->execute();   

        // Set variables to column values in db rows
        while ($row = $statement1->fetch(PDO::FETCH_ASSOC)) {
	        $book = $row['book'];
	        $chapter = $row['chapter'];
	        $verse = $row['verse'];
	        $content = $row['content'];

	        // Display to page	
	        echo $content;
	        echo "<p>Reference: " . $book . " " . $chapter . ": " . $verse . "</p>";
	    }
    ?>

</body>
</html>

