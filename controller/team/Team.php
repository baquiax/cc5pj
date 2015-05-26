<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Team {
	function newTeam($n = '', $f = '', $ci = 0, $p = '') {
		$connection = new Connection;
		$queryString = "insert into team (name, fundation_date, idcountry ,logo) values (?,str_to_date(?,'%Y-%m-%d'),?,?)";
		$parameters = array(array("value" => $n), array("value" => $f), array("value" => $ci, "type" => "i"), array("value" => $p));
		return $connection->execute($queryString, $parameters);
	}

	function filterTeamById($id) {
		$connection = new Connection;
		$queryString = "select t.*,c.code from team t, country c where t.idcountry = c.idcountry and t.idteam = ?";
		$parameters = array( array("value" => $id, "type" => "i"));
		return $connection->doQuery($queryString, $parameters);
	}

	function filterTeamsByName($name) {
		$connection = new Connection;
		$queryString = "select t.*,c.code from team t, country c where t.idcountry = c.idcountry and t.name like ?";
		$parameters = array( array("value" => "%".$name."%"));
		return $connection->doQuery($queryString, $parameters);
	}

	function editTeam($id, $n = "", $fd = "" ,$ic = 0, $p ="") {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "update team set name = ?, idcountry = ?, logo = ? , fundation_date = str_to_date(?, '%Y-%m-%d') where idteam = ?";
		$parameters = array( array("value" => $n), array("value" => $ic, "type" => "i"), array("value" => $p), array("value" => $fd), array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}


	function deleteTeam($id) {
		if(empty($id)) return false;
		$connection = new Connection;
		$queryString = "delete from team where idteam = ?";
		$parameters = array(array("value" => $id, "type" => "i"));
		return $connection->execute($queryString, $parameters);
	}

	function getAllTeams() {
		$connection = new Connection;
		$queryString = "select t.*,c.code from team t, country c where t.idcountry = c.idcountry";
		return $connection->doQuery($queryString);	
	}
}
?>