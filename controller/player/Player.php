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

	function filterPlayerById($id) {
		$connection = new Connection;
		$queryString = "select p.*,c.code from player p, country c where p.idcountry = c.idcountry and p.idplayer = ?";
		$parameters = array( array("value" => $id, "type" => "i"));
		return $connection->doQuery($queryString, $parameters);
	}

	function filterPlayersByName($name) {
		$connection = new Connection;
		$queryString = "select p.*,c.code from player p, country c where p.idcountry = c.idcountry and (p.firstname like ? or p.lastname like ?)";
		$parameters = array( array("value" => "%".$name."%"), array("value" => "%".$name."%"));
		return $connection->doQuery($queryString, $parameters);
	}


	function editPlayer($id, $fn = "", $ln = "", $b = "" ,$h = 0, $w = 0 ,$ic = 0, $p ="") {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "update player set firstname = ?, lastname = ?, born = str_to_date(?, '%Y-%m-%d'), 
		height = ?, weight = ?, idcountry = ?, photo = ?  where idplayer = ?";
		$parameters = array( 
			array("value" => $fn), 
			array("value" => $ln), 
			array("value" => $b), 
			array("value" => $h, "type" => "i"), 
			array("value" => $w, "type" => "i"), 
			array("value" => $ic, "type" => "i"), 
			array("value" => $p), 			
			array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}

	function getAllPlayers() {
		$connection = new Connection;
		$queryString = "select p.*, c.code from player p, country c where p.idcountry = c.idcountry";
		return $connection->doQuery($queryString);	
	}

	function deletePlayer($id) {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "delete from player where idplayer = ?";
		$parameters = array(array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}

}
?>