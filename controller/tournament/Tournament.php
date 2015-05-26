<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Tournament {
	function getAllTournaments() {
		$connection = new Connection;
		$querystring = "select * from tournament";
		return $connection->doQuery($querystring);
	}

	function deleteTournament($id) {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "delete from tournament where idtournament = ?";
		$parameters = array(array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}
	
	function newTournament($il, $n, $t, $p, $s, $e) {
		$connection = new Connection;
		$queryString = "insert into tournament (idleague, name, teams, phases, start, end) values (?,?,?,?,str_to_date(?,'%Y-%m-%d'),str_to_date(?,'%Y-%m-%d'))";
		$parameters = array(
			array("value" => $il, "type" => "i"),
			array("value" => $n),
			array("value" => $t, "type" => "i"),
			array("value" => $p, "type" => "i"),
			array("value" => $s),
			array("value" => $e),
		);
		return $connection->execute($queryString, $parameters);
	}
}
?>

