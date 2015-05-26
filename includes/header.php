<?php  
	if(empty($title)) $title = "FUT";
	if(empty($subtitle)) $subtitle = "info";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<script type="text/javascript" src="/cc5pj/bootstrap/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/cc5pj/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/cc5pj/js/jquery.ddslick.min.js"></script>
	<script type="text/javascript" src="/cc5pj/js/validator.js"></script>
	<link rel="stylesheet" href="/cc5pj/bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		html,body {
			height: 100%;
		}
		.footer {			
			height: 60px;
			background-color: #f5f5f5;
		}
		.container {
			width: auto;
			max-width: 680px;
			padding: 0 15px;
		}
		.container .text-muted {
			margin: 20px 0;
		}

		.main-container {
			min-height: 100%;
  			height: auto;
  			margin-bottom: -60px;
  			padding-bottom: 60px;
		}
		.dd-option-image {
			width: 32px !important;
		}

		.dd-select {
			min-height: 32px;
		}
	</style>
</head>
.<body> 
<header class="page-header">
  <h1><?php echo $title;?><small><?php echo $subtitle;?></small></h1>
</header>
<nav class="navbar navbar-default">
	<div class="container-fluid">
	    <div class="navbar-header">			
			<a class="navbar-brand" href="/cc5pj">Inicio</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		    <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios registrados <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="/cc5pj/login">Acceder </a></li>
					<li><a href="/cc5pj/logout">Editar perfil </a></li>
					<li><a href="/cc5pj/logout">Cerrar Sesion </a></li>
					<li class="divider"></li>
					<li><a href="/cc5pj/admin">Administrar </a></li>
				</ul>
		    </li>
      </ul>
	</div>
</nav>
<div class="container-fluid main-container">
  <div class="row">

  	<div class="col-md-3">
  		<div class="panel-group" role="tablist">
			<div class="panel panel-default">
      			<div class="panel-heading" role="tab" id="menu-header">
        			<h4 class="panel-title" id="-collapsible-list-group-">
            			Menu principal        				
        			</h4>
      			</div>
      			<div id="menu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="menu" aria-expanded="true">
			        <ul class="list-group">
			        	<?php
			        		if(empty($level)) {
			        	?>								
								<li class="list-group-item"><a href="/cc5pj/league">Ligas</a></li>
								<li class="list-group-item"><a>Ultimos Resultados</a></li>
						<?php
			        		} else if($level = "tournament") {
			        	?>
				        		<li class="list-group-item"><a href="/cc5pj/teams">Equipos</a></li>
				        		<li class="list-group-item"><a href="/cc5pj/tournament/phases">Fases</a></li>
								<li class="list-group-item"><a href="/cc5pj/player">Jugadores</a></li>								
			        	<?php
			        		}
			        	?>
					</ul>
      			</div>
    		</div>
  		</div>
  		<br/><br/>
  		<div class="panel-group" role="tablist">
			<div class="panel panel-default">
      			<div class="panel-heading" role="tab" id="menu-header">
        			<h4 class="panel-title" id="-collapsible-list-group-">
            			Administracion de Usuarios       				
        			</h4>
      			</div>
      			<div id="menu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="menu" aria-expanded="true">
			        <ul class="list-group">
		        		<li class="list-group-item"><a href="/cc5pj/teams">Usuarios</a></li>
		        		<li class="list-group-item"><a href="/cc5pj/tournament/phases">Roles</a></li>
					</ul>
      			</div>
    		</div>
  		</div>	 

  	</div>

  	<div class="col-md-9">
  		
 

