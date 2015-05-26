<?php
	include("../includes/header.php");
	include(dirname(__FILE__)."/../controller/team/Team.php");
?>

<form id="edit" method="POST" action="edit-team.php">
	<input type="hidden" name="idteam" value="">
</form>

<form id="delete" method="POST" action="/cc5pj/controller/team/delete-team.php">
	<input type="hidden" name="idteam" value="">
	<input type="hidden" name="url" value="/cc5pj/teams">
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
            	<a href="new-team.php" class="btn btn-default navbar-btn btn-success">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;CREAR EQUIPO
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
		<th>Fundacion</th>
		<th>Pais</th>		
		<th>Logo</th>

		<!-- ADMIN AREA -->
		<th colspan="2" class="text-center">MAS ACCIONES</th>			
	</tr>
	<?php
		$team = new Team;
		if(!empty($_POST["search"])) {
			$teams = $team->filterTeamsByName($_POST["search"]);
		} else {
			$teams = $team->getAllTeams();
		}

		foreach ($teams as $l) {
			$row = "<tr><td>".$l["idteam"]."</td><td>".$l["name"]."</td>"."<td>".$l["fundation_date"]."</td>"."<td><img width='64' src='/cc5pj/img/flags/". 
			strtolower($l["code"]).".svg'></td>"."<td><img width='64' src='/cc5pj/img/u/". $l["logo"]."'></td>";
			
			$row .= "<td class='text-center'><a href='javascript:edit(".$l["idteam"].")' class='btn btn-warning'>
						<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
					</a></td>";

			$row .= "<td class='text-center'><a href='javascript:remove(".$l["idteam"].")' class='btn btn-danger'>
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