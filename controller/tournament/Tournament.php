<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Tournament {
	function getAllTournaments() {
		$connection = new Connection;
		$querystring = "select idtournament, idleauge, l.name from phase";
		return $connection->doQuery($querystring);
	}

	function newTournament($il, $t, $p, $s, $e) {
		$connection = new Connection;
		$queryString = "insert into tournament (idleauge, teams, phases, start, end) values (?,?,?,str_to_date(?,'%Y-%m-%d'),str_to_date(?,'%Y-%m-%d'))";
		$parameters = array(
			array("value" => $il, "type" => "i"),
			array("value" => $t, "type" => "i"),
			array("value" => $p, "type" => "i"),
			array("value" => $s),
			array("value" => $e),
		);
		return $connection->execute($queryString, $parameters);
	}
}
?>

