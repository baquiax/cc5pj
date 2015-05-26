<?php
include( dirname(__FILE__)."/../../db/connection.php");
class League {
	function getAllLeagues() {
		$connection = new Connection;
		$queryString = "inser";
		$parameters = array( array("value" => $n), array("value" => $ic, "type" => "i"), array("value" => $p));
		return $connection->execute($queryString, $parameters);
	}

	function newLeague($n = "", $ic = 0, $p ="") {
		$connection = new Connection;
		$queryString = "insert into league (name, idcountry, photo) values (?,?,?)";
		$parameters = array( array("value" => $n), array("value" => $ic, "type" => "i"), array("value" => $p));
		return $connection->execute($queryString, $parameters);
	}
}
?>