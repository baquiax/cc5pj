<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class League {
	function getAllLeagues() {
		$connection = new Connection;
		$queryString = "select l.*,c.code from league l, country c where l.idcountry = c.idcountry";		
		return $connection->doQuery($queryString);
	}

	function filterLeaguesById($id) {
		$connection = new Connection;
		$queryString = "select l.*,c.code from league l, country c where l.idcountry = c.idcountry and l.idleague = ?";
		$parameters = array( array("value" => $id, "type" => "i"));
		return $connection->doQuery($queryString, $parameters);
	}

	function editLeague($id, $n = "", $ic = 0, $p ="") {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "update league set name = ?, idcountry = ?, photo = ? where idleague = ?";
		$parameters = array( array("value" => $n), array("value" => $ic, "type" => "i"), array("value" => $p), array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}

	function deleteLeague($id) {
		$connection = new Connection;
		$queryString = "delete from league where idleague = ?";
		$parameters = array( array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);	
	}

	function newLeague($n = "", $ic = 0, $p ="") {
		$connection = new Connection;
		$queryString = "insert into league(name, idcountry, photo) values(?,?,?)";
		$parameters = array( array("value" => $n), array("value" => $ic, "type" => "i"), array("value" => $p));
		return $connection->execute($queryString, $parameters);
	}
}
?>
