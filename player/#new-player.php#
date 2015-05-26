<?php
	$level = "tournament";
	include("../includes/header.php");
	include("../controller/country/Country.php");
?>

<form action="/cc5pj/controller/player/new-player.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
    	<label for="firstname">Nombres</label>
    	<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres">
  	</div>

  	<div class="form-group">
    	<label for="lastname">Apellidos</label>
    	<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos">
  	</div>
  	
  	<div class="form-group">
    	<label for="born">Nacimiento</label>
    	<input type="date" class="form-control" id="born" name="born" placeholder="01/03/1993">
  	</div>
 	
 	<div class="form-group">
    	<label for="height">Altura</label>
    	<input type="number" class="form-control" id="height" name="height" placeholder="x.y metros" step="any">
  	</div>
  	
  	<div class="form-group">
    	<label for="weight">Peso</label>
    	<input type="number" class="form-control" id="weight" name="weight" placeholder="x.y Kilogramos" step="any">
  	</div>
  	
  	<div class="form-group">
    	<label for="idcountry">Pais</label>
    	<input type="hidden" id="hidden-idcountry" name="idcountry">
    	<select id="idcountry" class="form-control">
    		<option></option>
    		<?php
    			$country = new Country;
    			foreach ($country->getAllCountries() as $country) {
    				echo "<option data-description='".$country["code"]."' value='".$country["idcountry"]."' data-imagesrc='/cc5pj/img/flags/".strtolower($country["code"]).".svg'>".$country["country"]."</option>";
    			}
    		?>
    	</select>
    	<script type="text/javascript">
    		jQuery('#idcountry').ddslick(
    			{
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
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
	include("../includes/footer.php");
?>