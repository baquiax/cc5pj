<?php
	$level = "tournament";
	include("../../includes/header.php");
	include(dirname(__FILE__)."/../../controller/tournament/Phase.php");
?>

<form method="POST" action="/cc5pj/controller/tournament/new-phase.php">
	<input type="hidden" name="url" value="/cc5pj/tournament/phases">
	<div class="form-group">
		<label for="phase">Fase</label>
		<input type="text" class="form-control" name="phase" id="phase" placeholder="Cuartos de final, Octavos de final">
	</div>
	<button type="submit" class="btn btn-default">Guardar</button>
</form>

<?php
	include("../../includes/footer.php");
?>