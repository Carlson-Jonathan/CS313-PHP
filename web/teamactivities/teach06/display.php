<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../teach06/teach06.css">
</head>

<body>
	<?php 
		require('postgresqlsetup.php');

		$book = $_POST['book'];
		$chapter = $_POST['chapter'];
		$verse = $_POST['verse'];
		$content = $_POST['content'];
		$topic = $_POST['topic'];

		//$statement = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content)
		//	VALUES(:book, :chapter, :verse, :content)');
	
		try {

			$query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
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

		$sqlid = $db->lastInsertId(id_seq);

		foreach($topic as $row) {
			/*$statement = $db->prepare("INSERT INTO topic_scripture (topic_id, scripture_id)
				VALUES($row['id'], $sqlid);");
			$statement->execute();*/
			var_dump($row);
		}

	?>


</body>
</html>