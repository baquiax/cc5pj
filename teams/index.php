<?php
	$level = "tournament";
	include("../includes/header.php");
	include(dirname(__FILE__)."/../controller/team/Team.php");
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="new-team.php">Agregar</a></li>
  <li role="presentation" class="active"><a href="#">Buscar</a></li>
</ul>
<br/><br/>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Fundacion</th>
		<th>Logo</th>
	</tr>
	<?php
		$team = new Team;
		foreach ($team->getAllTeams() as $team) {
			echo "<tr><td>".$team["idteam"]."</td><td>".$team["name"]."</td><td>".$team["fundation_date"]."</td><td><img width='90' src='/cc5pj/img/u/".$team["logo"]."'></td></tr>";
		}
	?>
</table>

<?php
	include("../includes/footer.php");
?>