<?php
	$level = "tournament";
	include("../includes/header.php");
	include(dirname(__FILE__)."/../controller/tournament/Tournament.php");
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
		<th>Liga</th>
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