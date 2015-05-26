<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Player {
	function newPlayer($fn = '', $ln = '', $b = '', $h = 0.0, $w = 0.0, $ic = 0, $p = '') {
		$connection = new Connection;
		$queryString = "insert into player (firstname, lastname, born, height, weight, idcountry, photo) values (?,?,str_to_date(?,'%Y-%m-%d'),?,?,?,?)";
		$parameters = array(array("value" => $fn), array("value" => $ln), array("value" => $b), array("value" => $h, "type" => "d"), array("value" => $w, "type" => "d"),
		array("value" => $ic, "type" => "i"), array("value" => $p));
		return $connection->execute($queryString, $parameters);
	}

	function getAllPlayers() {
		$connection = new Connection;
		$queryString = "select p.*, c.code from player p, country c where p.idcountry = c.idcountry";
		return $connection->doQuery($queryString);	
	}
}
?>