<?php
$level = "tournament";
include("../includes/header.php");
include(dirname(__FILE___)."/../controller/leage/League.php");
include(dirname(__FILE___)."/../controller/tournament/Phase.php");
?>
<form action="/cc5pj/controller/player/new-player.php" method="post" >
  	<div class="form-group">
    		<label for="idcountry">Liga</label>
    		<input type="hidden" id="hidden-idcountry" name="idcountry">
    		<select id="idcountry" class="form-control">
    			<option></option>
    			<?php
    			$league = new League;
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
    		<label for="lastname">Cantidad de teams</label>
    		<input type="number" class="form-control" id="teams" name="teams">
  	</div>
  	
  	<div class="form-group">
    		<label for="phases">Fases</label>
    		<input type="number" class="form-control" id="phases" name="phases">
  	</div>
 	
 	<div class="form-group">
    		<label for="height">Inicia</label>
    		<input type="date" class="form-control" id="start" name=start">
  	</div>
  	
  	<div class="form-group">
    		<label for="weight">Concluye</label>
    		<input type="date" class="form-control" id="end" name="end">
  	</div>
</form>

<?php
	include("../includes/footer.php");
?>
