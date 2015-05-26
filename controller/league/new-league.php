<?php
include_once("League.php");
$imgDir = dirname(__FILE__)."/../../img/player/";
$imageName = "img-".round(microtime(true) * 1000);
$imageRealPath = $imgDir . basename($imageName);

$path = $_FILES["photo"]["name"];
$imageFileType = pathinfo($path, PATHINFO_EXTENSION);

$imageRealPath .= "." . $imageFileType;
$uploadOk = 1;

if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	$uploadOk = ($check !== false) ? 1 : 0; 
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {    
	$uploadOk = 0;
}

if ($uploadOk == 1) {
	if (move_uploaded_file($_FILES["photo"]["tmp_name"], $imageRealPath)) {
	    	
	} else {
	        //Error!!!!
	}
} else {
	$imageName = "";
}

$league = new League;
$n = (!empty($_POST['name'])) ? $_POST['name'] : "";
$idCountry = (!empty($_POST['idcountry'])) ? $_POST['idcountry'] : "";    
$league->newLeague($n, $idCountry, $imageName);
?>
