<?php 
	require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');

	if(isset($_POST['balance']));
    	$balance = $_POST['balance'];
	if(isset($_GET['player_id']));
    	$player_id = htmlspecialchars($_GET['player_id']);

	$setbalance = "UPDATE family SET balance_owed = " . $balance . " WHERE player_id = " . $player_id . ";";

	echo "<br><br>" . $setbalance;

	$update = $db->prepare($setbalance);
	$update->execute();

    header("Location: prove06.php");
    die();	
?>