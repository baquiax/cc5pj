<?php
include_once("League.php");

$league = new League;
$id = (!empty($_POST['idleague'])) ? $_POST['idleague'] : "";    
if(!empty($id))
	$league->deleteLeague($id);

$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
header("Location: /cc5pj/notifications/done.php?url=".$url);
?>
