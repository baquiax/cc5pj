<?php
$level = "tournament";
include("../includes/header.php");
include("../controller/country/Country.php");
?>

<form action="/cc5pj/controller/league/new-league.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
    		<label for="name">Nombre de la Liga</label>
    		<input type="text" class="form-control" id="name" name="name" placeholder="Liga Guatemalteca, Liga Francesa">
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
