<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../teach06/teach06.css">
</head>

<body>
	<?php 
		require('postgresqlsetup.php');

		$book = $_POST['ibook'];
		$chapter = $_POST['ichapter'];
		$verse = $_POST['iverse'];
		$content = $_POST['icontent'];
		$topic = $_POST['topic'];

		echo $book . " " . $chapter . ":" . $verse . " - " . $content . "<br>Topic: ";

		//$statement = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content)
		//	VALUES(:book, :chapter, :verse, :content)');
	
		try {

			$query = 'INSERT INTO scriptures(book, chapter, verse, content) 
			VALUES(:book, :chapter, :verse, :content)';

			$statement = $db->prepare($query);

			$statement->bindValue(':book', $book);
			$statement->bindValue(':chapter', $chapter);
			$statement->bindValue(':verse', $verse);
			$statement->bindValue(':content', $content);
			$statement->execute();
		}
	    catch (PDOException $ex) {
	        print "<p>error: $ex->getMessage() </p>\n\n";
	        die();			
		}

		//$sqlid = $db->lastInsertId(id_seq);

		foreach($topic as $key => $value) {
			//$statement = $db->prepare("INSERT INTO topic_scripture (topic_id, scripture_id) VALUES($row['id'], $_SESSION['id');");
			//$statement->execute();
			echo $value;
		}

	?>


</body>
</html>