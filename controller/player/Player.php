<?php
include( dirname(__FILE__)."/../../db/connection.php");
class Player {

	function newPlayer($fn = '', $ln = '', $b = '', $h = 0.0, $w = 0.0, $ic = 0, $p = '') {
		$connection = new Connection;
		$queryString = "insert into player (firstname, lastname, born, height, weight, idcountry, photo) values (?,?,str_to_date(?, '%d/%m/%Y'),?,?,?,?)";
		$parameters = array($fn, $ln, $b, $h, $w,$ic, $p);
		return $connection->execute($queryString, $parameters);
	}
}
?>