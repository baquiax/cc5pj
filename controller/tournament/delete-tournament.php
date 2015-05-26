<?php
include_once("Tournament.php");

$tournament = new Tournament;
$id = (!empty($_POST['idtournamnet'])) ? $_POST['idtournament'] : "";    
if(!empty($id))
	$team->deleteTournament($id);

$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
header("Location: /cc5pj/notifications/done.php?url=".$url);
?>
