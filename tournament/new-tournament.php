<?php
$level = "tournament";
include("../includes/header.php");
include(dirname(__FILE__)."/../controller/league/League.php");
include(dirname(__FILE__)."/../controller/tournament/Phase.php");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Creacion de torneo.</h3>
    </div>
    <div class="panel-body">
        <form action="/cc5pj/controller/player/new-player.php" method="post"  data-toggle="validator">
            <input type="hidden" name="url" value="/cc5pj/tournament">
            <div class="form-group">
                <label for="idleague">Liga</label>
                <input required type="hidden" id="hidden-idleague" name="idleague">
                <select id="idleague" class="form-control" >                    
                    <?php
                        $league = new League;
                        foreach ($league->getAllLeagues() as $l) {
                            echo "<option data-description='--' value='".$l["idleague"]."' data-imagesrc='/cc5pj/img/u/".strtolower($l["photo"])."'>".$l["name"]."</option>";
                        }
                    ?>
                </select>
                <script type="text/javascript">
                    jQuery('#idleague').ddslick(
                      {
                        width: 600, 
                        height: 350,
                        onSelected: function(data){
                            console.info(data);
                            jQuery("#hidden-idleague").attr("value", data.selectedData.value);             
                        }    
                      });
                </script>
                <span id="helpBlock" class="help-block">Elije la liga a la que pertenece este torneo.</span>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input required type="text" class="form-control" id="name" name="name" placeholder="Torneo Apertura 2014, Torneto Clausura 2015">
            </div>
            <div class="form-group">
                <label for="teams">Cantidad de equipos</label>
                <input required type="number" class="form-control" id="teams" name="teams">
            </div>
            <div class="form-group">
                <label for="phases">Fases a disputar</label>
                <input required type="number" class="form-control" id="phases" name="phases">
            </div>
            <div class="form-group">
                <label for="start">Inicia</label>
                <input required type="date" class="form-control" id="start" name="start">
            </div>
            <div class="form-group">
                <label for="end">Concluye</label>
                <input required type="date" class="form-control" id="end" name="end">
            </div>
            <br/>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;&nbsp;CREAR TORNEO
                </button>
            </div>
        </form>
    </div>    
</div>


<?php
	include("../includes/footer.php");
?>
