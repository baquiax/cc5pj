<?php
include_once( dirname(__FILE__)."/../../db/connection.php");
class Country {

	var $connection;
	function __construct() {
		$this->connection = new Connection;
	}

	function getAllCountries(){
		$queryString = "select idcountry, country, code from country";		
		return $this->connection->doQuery($queryString);
	}
}
?>