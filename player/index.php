<?php
	$level = "tournament";
	include("../includes/header.php");
	include(dirname(__FILE__)."/../controller/player/Player.php");
?>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="new-player.php">Agregar</a></li>
  <li role="presentation" class="active"><a href="#">Buscar</a></li>
</ul>
<br/><br/>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Nombres</th>
		<th>Apellido</th>
		<th>Nacimiento</th>
		<th>Altura</th>
		<th>Peso</th>
		<th>Pais</th>
		<th>Foto</th>
	</tr>
	<?php
		$player = new Player;		
		foreach ($player->getAllPlayers() as $p) {
			echo "<tr>"."<td>".$p["idplayer"]."</td>"."<td>".$p["firstname"]."</td><td>".$p["lastname"]."</td>"."<td>".$p["born"]."</td>"."<td>".$p["height"]."</td>"."<td>".
			$p["weight"]."</td>"."<td><img width='64' src='/cc5pj/img/flags/".strtolower($p["code"]).".svg'></td>"
			."<td><img width='80' src='/cc5pj/img/u/".strtolower($p["photo"])."'></td>"."</tr>";
		}
	?>
</table>

<?php
	include("../../includes/footer.php");
?>