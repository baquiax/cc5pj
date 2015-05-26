<?php
include_once("Team.php");

$team = new Team;
$id = (!empty($_POST['idteam'])) ? $_POST['idteam'] : "";    
if(!empty($id))
	$team->deleteTeam($id);

$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
header("Location: /cc5pj/notifications/done.php?url=".$url);
?>
