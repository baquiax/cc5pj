<?php	
include("../includes/header.php");
include("../controller/country/Country.php");
include("../controller/team/Team.php");

$team = new Team;
foreach ($team->filterTeamById($_POST["idteam"]) as $l) {
    $idteam = $l["idteam"];
    $name = $l["name"];
    $fundation_date = $l["fundation_date"];
    $idcountry = $l["idcountry"];
    $existentPhoto = $l["logo"];
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Creacion de equipo</h3>
    </div>
    <div class="panel-body" >
    	<form action="/cc5pj/controller/team/edit-team.php" method="post" enctype="multipart/form-data" data-toggle="validator">
			<input type="hidden" name="url" value="/cc5pj/teams"> 
            <input type="hidden" name="idteam" value="<?php echo $idteam?>">
            <input type="hidden" name="ephoto" value="<?php echo $existentPhoto?>">

			<div class="form-group">
				<label for="firstname">Nombre</label>
				<input required type="text" class="form-control" id="firstname" name="name" placeholder="Nombres" value="<?php echo $name?>">
			</div>  	

			<div class="form-group">
				<label for="born">Fundacion</label>
				<input required type="date" class="form-control" id="born" name="fundation_date" placeholder="01/03/1993" value="<?php echo $fundation_date?>">
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
                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;&nbsp;EDITAR EQUIPO
                </button>
            </div>
		</form>
    </div>
</div>

<?php
	include("../includes/footer.php");
?>