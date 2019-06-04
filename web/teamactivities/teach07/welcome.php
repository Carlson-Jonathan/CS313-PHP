<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		$_SESSION['user_id'] = 0;
	}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	require("postgresqlsetup.php");
	if($_SESSION['user_id'] == 0) {
		header("Location: teach07.php");
	}
	else {
		$id = $_SESSION['user_id'];
		$getusername = $db->prepare("SELECT username FROM users WHERE id = $id");
		$getusername->execute();

		$username = $getusername->fetch(PDO::FETCH_ASSOC);
		$user = $username['username'];
		echo "Welcome your name is $user";
		}




?>	
</body>
</html>

