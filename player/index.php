<?php
	include("../includes/header.php");
	include(dirname(__FILE__)."/../controller/player/Player.php");
?>

<form id="edit" method="POST" action="edit-player.php">
	<input type="hidden" name="idplayer" value="">
</form>

<form id="delete" method="POST" action="/cc5pj/controller/player/delete-player.php">
	<input type="hidden" name="idplayer" value="">
	<input type="hidden" name="url" value="/cc5pj/player">
</form>
<script type="text/javascript">
	function edit(identifier) {
		jQuery("#edit input").first().val(identifier);
		jQuery("#edit").submit();
	}

	function remove(identifier){
		if(confirm("Esta seguro de eliminar este elemento?")){
			jQuery("#delete input").first().val(identifier);
			jQuery("#delete").submit();		
		}
	}
</script>

<nav class="navbar navbar-default">
    <div class="container-fluid">        
        <div class="navbar-header">
            <span class="navbar-brand">Administrar</span>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <div class="nav navbar-nav navbar-left">
            	<a href="new-player.php" class="btn btn-default navbar-btn btn-success">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;CREAR JUGADOR
				</a>        
            </div>

            <form class="navbar-form navbar-right" role="search" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="search" value="<?php echo $_POST['search']?>">
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
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Nacimiento</th>
		<th>Altura</th>		
		<th>Peso</th>
		<th>Pais</th>
		<th>Foto</th>

		<!-- ADMIN AREA -->
		<th colspan="2" class="text-center">MAS ACCIONES</th>			
	</tr>
	<?php
		$player = new Player;
		if(!empty($_POST["search"])) {
			$players = $player->filterPlayersByName($_POST["search"]);
		} else {
			$players = $player->getAllPlayers();
		}

		foreach ($players as $p) {
			$row = "<tr>";
			$row .= "<td>".$p["idplayer"]."</td>";
			$row .= "<td>".$p["firstname"]."</td>";
			$row .= "<td>".$p["lastname"]."</td>";
			$row .= "<td>".$p["born"]."</td>";
			$row .= "<td>".$p["height"]." m.</td>";
			$row .= "<td>".$p["weight"]." kg.</td>";
			$row .= "<td><img width='64' src='/cc5pj/img/flags/". strtolower($p["code"]).".svg'></td>";
			$row .= "<td><img width='64' src='/cc5pj/img/u/". $p["photo"]."'></td>";

			$row .= "<td class='text-center'><a href='javascript:edit(".$p["idplayer"].")' class='btn btn-warning'>
						<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
					</a></td>";
			$row .= "<td class='text-center'><a href='javascript:remove(".$p["idplayer"].")' class='btn btn-danger'>
						<span class='glyphicon glyphicon-minus' aria-hidden='true'></span>
					</a></td>";			
			$row .= "</tr>";
			echo $row;
		}
	?>
</table>

<?php
	include("../includes/footer.php");
?>