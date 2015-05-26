<?php
include_once("Player.php");

$player = new Player;
$id = (!empty($_POST['idplayer'])) ? $_POST['idplayer'] : "";    
if(!empty($id))
	$player->deletePlayer($id);

$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
header("Location: /cc5pj/notifications/done.php?url=".$url);
?>
