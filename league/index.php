<?php
	include_once("../includes/header.php");
	include_once(dirname(__FILE__)."/../controller/league/League.php");
?>


<form id="tournaments" method="POST" action="/cc5pj/tournament/">
	<input type="hidden" name="idleague" value="">
</form>

<form id="edit" method="POST" action="edit-league.php">
	<input type="hidden" name="idleague" value="">
</form>

<form id="delete" method="POST" action="/cc5pj/controller/league/delete-league.php">
	<input type="hidden" name="idleague" value="">
	<input type="hidden" name="url" value="/cc5pj/league">
</form>
<script type="text/javascript">
	function edit(identifier) {
		jQuery("#edit input").first().val(identifier);
		jQuery("#edit").submit();
	}

	function openLeague(identifier) {
		jQuery("#tournaments input").first().val(identifier);
		jQuery("#tournaments").submit();
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
            	<a href="new-league.php" class="btn btn-default navbar-btn btn-success">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;CREAR LIGA
				</a>        
            </div>

            <form class="navbar-form navbar-right" role="search" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="search" value="<?php if (empty($_POST['search'])) { echo $_POST['search']; }?>">
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
		<th>Liga</th>
		<th>Pais</th>
		<th>Logo</th>

		<!-- ADMIN AREA -->
		<th colspan="2" class="text-center">MAS ACCIONES</th>			
	</tr>
	<?php
		$league = new League;
		if(!empty($_POST["search"])) {
			$leagues = $league->filterLeaguesByName($_POST["search"]);
		} else {
			$leagues = $league->getAllLeagues();
		}

		foreach ($leagues as $l) {
			$row = "<tr><td>".$l["idleague"]."</td>";

			$row .= "<td><a href='javascript:openLeague(".$l["idleague"].")'>".$l["name"]."</a></td>";
			
			$row .= "<td><img width='64' src='/cc5pj/img/flags/". 
			strtolower($l["code"]).".svg'></td>"."<td><img width='64' src='/cc5pj/img/u/". $l["photo"]."'></td>";
			
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
	include("../includes/footer.php");
?>