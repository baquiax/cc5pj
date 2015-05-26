<?php
	include_once("Team.php");

	$imageName = "";
	if(!empty($_FILES["photo"]["name"])) {
		$imgDir = dirname(__FILE__)."/../../img/u/";
		$imageName = "img-".round(microtime(true) * 1000);
		$imageRealPath = $imgDir . basename($imageName);
		$path = $_FILES["photo"]["name"];
		$imageFileType = pathinfo($path, PATHINFO_EXTENSION);
		$imageName .= "." . $imageFileType;
		$imageRealPath .= "." . $imageFileType;
		$uploadOk = 1;

		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			$uploadOk = ($check !== false) ? 1 : 0; 
		}

		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["photo"]["tmp_name"], $imageRealPath);
		} else {
			$imageName = "";
		}	
	}

	$team = new Team;
	$id = (!empty($_POST['idteam'])) ? $_POST['idteam'] : "";
	$n = (!empty($_POST['name'])) ? $_POST['name'] : "";
	$idCountry = (!empty($_POST['idcountry'])) ? $_POST['idcountry'] : "";
	$ephoto = (!empty($_POST['ephoto'])) ? $_POST['ephoto'] : "";
	$fd = (!empty($_POST['fundation_date'])) ? $_POST['fundation_date'] : "";
	$imageName = (!empty($imageName)) ? $imageName : $ephoto;

	$team->editTeam($id, $n, $fd, $idCountry, $imageName);

	$url = (!empty($_POST['url'])) ? $_POST['url'] : "";
	header("Location: /cc5pj/notifications/done.php?url=".$url);
?>
