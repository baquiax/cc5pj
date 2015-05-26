<?php
	session_start();
	$level = "tournament";
	if (!empty($_POST["idleague"]))
		$_SESSION["idleague"] = $_POST["idleague"];

	include_once("../includes/header.php");
	include_once(dirname(__FILE__)."/../controller/tournament/Tournament.php");
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">        
        <div class="navbar-header">
            <span class="navbar-brand">Administrar</span>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">            
            <div class="nav navbar-nav navbar-left">
            	<a href="new-tournament.php" class="btn btn-default navbar-btn btn-success">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;CREAR TORNEO
				</a>        
            </div>

            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Filtrar</button>
            </form>          
        </div>        
    </div>    
</nav>
<h4>Torneos existentes</h4>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>name</th>
		<th>Limite de equipos</th>
		<th>Fases contempladas</th>
		<th>Inicia</th>
		<th>Concluye</th>

		<th colspan="2" class="text-center">MAS ACCIONES</th>			
	</tr>
	<?php
		$tournament = new Tournament;
		foreach ($tournament->getAllTournaments() as $t) {
			$row = "<tr>";
			$row .= "<td>".$t["idtournament"]."</td>";
			$row .= "<td>".$t["name"]."</td>";
			$row .= "<td>".$t["teams"]."</td>";
			$row .= "<td>".$t["phases"]."</td>";
			$row .= "<td>".$t["start"]."</td>";
			$row .= "<td>".$t["end"]."</td>";

			$row .= "<td class='text-center'><a href='javascript:edit(".$l["idleague"].")' class='btn btn-warning'>
						<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
					</a></td>";

			$row .= "<td class='text-center'><a href='javascript:remove(".$l["idleague"].")' class='btn btn-danger'>
						<span class='glyphicon glyphicon-minus' aria-hidden='true'></span>
					</a></td>";

			$row .= "</tr>";
			echo $row;
		}
	?>
</table>

<?php
	include("../../includes/footer.php");
?>