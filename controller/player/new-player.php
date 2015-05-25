<?php
	include_once("Player.php");
	$imgDir = "../../img/player/";
	$imageName = $imgDir . basename("img-".round(microtime(true) * 1000));
	$path = $_FILES["photo"]["name"];
	$imageFileType = pathinfo($path, PATHINFO_EXTENSION);
	$imageName .= "." . $imageFileType;
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
	    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $imageName)) {
	    	
	    } else {
	        //Error!!!!
	    }
	} else {
		$imageName = "";
	}

	$player = new Player;
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$b = $_POST['born'];
	$h = $_POST['height'];
	$w = $_POST['weight'];
	$idCountry = $_POST['idcountry'];    
	$player->newPlayer($fn, $ln, $b, $h, $w, $idCountry, $imageName);
?>