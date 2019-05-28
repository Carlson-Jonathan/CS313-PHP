
<?php require('postgresqlsetup.php');
//require('content.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../styles/normalize.css">
    <link id="styles" rel="stylesheet" href="../teach06/teach06.css">
	<title></title>
</head>

<body>


	<form method="post" action="display.php">
		<label for="book">Insert Book name</label><br>
		<input type="text" name="book" placeholder="insert book" ><br>

		<label for="chapter">Insert Chapter</label><br>
		<input type="text" name="chapter" placeholder="insert chapter"><br>

		<label for="verse">Insert Verse</label><br>
		<input type="text" name="verse" placeholder="verse"><br>

		<label for="content">Insert Scripture Text</label><br>
		<textarea name="content" rows="6" cols="50"></textarea><br>

		<?php  

			$statement = $db->prepare("SELECT * FROM topic;");
        	$statement->execute(); 			

			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		        $id = $row['id'];
		        $name = $row['name'];


				echo "<br><input type='checkbox' name='topic[]' value='$id'>";
	    	}
		?>
		<br><input type="submit" >
	</form>


</body>



</html>
