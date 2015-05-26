<?php
	$level = "tournament";
	include("../includes/header.php");
?>

<form action="/cc5pj/controller/team/new-team.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="url" value="/cc5pj/teams"> 
	<div class="form-group">
    	<label for="firstname">Nombre</label>
    	<input type="text" class="form-control" id="firstname" name="name" placeholder="Nombres">
	</div>  	
  	
	<div class="form-group">
  	<label for="born">Fundacion</label>
  	<input type="date" class="form-control" id="born" name="fundation_date" placeholder="01/03/1993">
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