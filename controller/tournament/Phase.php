<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Phase {
	function getAllPhases() {
		$connection = new Connection;
		$querystring = "select idphase, phase from phase";
		return $connection->doQuery($querystring);
	}

	function newPhase($phase) {
		$connection = new Connection;
		$queryString = "insert into phase (phase) values (?)";
		$parameters = array(array("value" => $phase));
		return $connection->execute($queryString, $parameters);
	}
}
?>
