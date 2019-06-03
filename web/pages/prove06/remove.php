<?php
	require($_SERVER['DOCUMENT_ROOT'].'/scripts/prove06setup.php');

	if(isset($_GET['player_id']));
    	$player_id = htmlspecialchars($_GET['player_id']);

	echo $player_id;

	$removef = $db->prepare("DELETE FROM family WHERE player_id = $player_id;");
	$removep = $db->prepare("DELETE FROM players WHERE player_id = $player_id;");

	$removef->execute();
	$removep->execute();

    header("Location: prove06.php");
    die();	
?>