<?php
	$level = "tournament";
	include("../../includes/header.php");
	include(dirname(__FILE__)."/../../controller/tournament/Phase.php");
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="new-phase.php">Agregar</a></li>
  <li role="presentation" class="active"><a href="#">Buscar</a></li>
</ul>
<br/><br/>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Fase</th>
	</tr>
	<?php
		$phase = new Phase;
		foreach ($phase->getAllPhases() as $phase) {
			echo "<tr><td>".$phase["idphase"]."</td><td>".$phase["phase"]."</td></tr>";
		}
	?>
</table>

<?php
	include("../../includes/footer.php");
?>