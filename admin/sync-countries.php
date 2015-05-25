<?php
	include("../includes/header.php");
	include_once("../db/connection.php");
?>

<?php  
	$url = "http://services.groupkt.com/country/get/all";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$countries = curl_exec($ch);
	curl_close($ch);
	$countries = utf8_decode($countries);
	$countries = json_decode($countries,true);
	if(!$countries) {
		echo "Ups! Ha ocurrido un error";
		die();
	}
	$connection = new Connection;
	$connection->execute("delete from country where idcountry > 0");
	$connection->execute("ALTER TABLE country AUTO_INCREMENT = 1");
	foreach ($countries["RestResponse"]["result"] as $country) {
		$params = $arrayName = array(
			$arrayName = array('value' => ($country["name"])),
			$arrayName = array('value' => $country["alpha2_code"])			
		);	
		$connection->execute("insert into country(country, code) values (?,?)", $arrayName);
	}
?>

<?php
	include("../includes/footer.php");
?>