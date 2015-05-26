<?php
	include_once("Tournament.php");

	$tournament = new Tournament;
	$il = (!empty($_POST['idleague'])) ? $_POST['idleague'] : "";
	$n = (!empty($_POST['name'])) ? $_POST['name'] : "";
	$t = (!empty($_POST['teams'])) ? $_POST['teams'] : "";
	$p = (!empty($_POST['phases'])) ? $_POST['phases'] : "";
	$s = (!empty($_POST['start'])) ? $_POST['start'] : "";
	$e = (!empty($_POST['end'])) ? $_POST['end'] : "";
	$tournament->newTournament($il, $n, $t, $p, $s, $e);

	$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
	header("Location: /cc5pj/notifications/done.php?url=".$url);
?>