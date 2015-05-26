<?php
	include("../includes/header.php");
	include("../controller/country/Country.php");
	include("../controller/player/Player.php");

	$player = new Player;
	foreach ($player->filterPlayerById($_POST["idplayer"]) as $l) {
	    $idplayer = $l["idplayer"];
	    $firstname = $l["firstname"];
	    $lastname = $l["lastname"];
	    $born = $l["born"];
	    $height = $l["height"];
	    $weight = $l["weight"];
	    $idcountry = $l["idcountry"];
	    $existentPhoto = $l["photo"];
	}

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Creacion de equipo</h3>
    </div>
    <div class="panel-body" >
        <form action="/cc5pj/controller/player/edit-player.php" method="post" enctype="multipart/form-data" data-toggle="validator">
            <input type="hidden" name="url" value="/cc5pj/player">
            <input type="hidden" name="idplayer" value="<?php echo $idplayer?>">
            <input type="hidden" name="ephoto" value="<?php echo $existentPhoto?>">

            <div class="form-group">
                <label for="firstname">Nombres</label>
                <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" value="<?php echo $firstname?>">
            </div>
            <div class="form-group">
                <label for="lastname">Apellidos</label>
                <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" value="<?php echo $lastname?>">
            </div>
            <div class="form-group">
                <label for="born">Nacimiento</label>
                <input required type="date" class="form-control" id="born" name="born" placeholder="01/03/1993" value="<?php echo $born?>">
            </div>
            <div class="form-group">
                <label for="height">Altura</label>
                <input required type="number" class="form-control" id="height" name="height" placeholder="x.y metros" step="any" value="<?php echo $height?>">
            </div>
            <div class="form-group">
                <label for="weight">Peso</label>
                <input required type="number" class="form-control" id="weight" name="weight" placeholder="x.y Kilogramos" step="any" value="<?php echo $weight?>">
            </div>

            <div class="form-group">
                <label for="idcountry">Pais</label>
                <input type="hidden" id="hidden-idcountry" name="idcountry">
                <select id="idcountry" class="form-control">                        
                    <?php
                        $country = new Country;
                        foreach ($country->getAllCountries() as $country) {
                            $selected = ($country["idcountry"] == $idcountry) ? "selected" : "";
                            echo "<option ".$selected." data-description='".$country["code"]."' value='".$country["idcountry"]."' data-imagesrc='/cc5pj/img/flags/".strtolower($country["code"]).".svg'>".$country["country"]."</option>";
                        }
                    ?>
                </select>
                <script type="text/javascript">
                    jQuery('#idcountry').ddslick({
                        width: 600, 
                        height: 350,
                        onSelected: function(data){
                            console.info(data);
                            jQuery("#hidden-idcountry").attr("value", data.selectedData.value);                     
                        }    
                    });
                </script>
            </div>  

            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*">
                <p class="help-block">Elije una fotografia.</p>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;&nbsp;EDITAR DATOS
                </button>
            </div>
        </form>
    </div>
</div>



<?php
	include("../includes/footer.php");
?>