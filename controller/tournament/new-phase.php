<?php
include_once("Phase.php");

$phase = new Phase;
$n = (!empty($_POST['phase'])) ? $_POST['phase'] : "";
$phase->newPhase($n);

$returnUrl = (!empty($_POST['url'])) ? $_POST['url'] : "";
header('Location: '.$returnUrl);
?>
