<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form method="post" action="signup.php">
		<label>Enter user name:</label><br>
		<input type="text" name="username" required><br>
		
		<label>Enter Password:</label><br>
		<input type="password" name="password" required pattern="(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>	
		
		<label>Confirm Password:</label><br>
		<input type="password" name="confirmpassword" required pattern="(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
		
		<input type="submit" name="submit"><br>
	</form>	

	<?php 
		require("postgresqlsetup.php");
		if(isset($_POST['submit'])) {
			
			$p1 = $_POST['password'];
			$p2 = $_POST['confirmpassword'];

			//echo "<script> alert('" . $p1 . " " . $p2 . "'); </script>";

			if($p1 == $p2) {
				$password = $_POST['password'];
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$username = $_POST['username'];

				$insert = $db->prepare("INSERT INTO users(username, password) VALUES(:username, :hashedPassword)");
				$insert->bindValue(':username', $username);
				$insert->bindValue(':hashedPassword', $hashedPassword);

				$insert->execute();

				$id = $db->lastInsertId(users_id_seq);
				$_SESSION['user_id'] = $id;
				header("Location: teach07.php");
				die();
			}
		}

	?>hashedPassword . "

</body>
</html>