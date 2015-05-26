<?php
include("../includes/header.php");
include("../controller/country/Country.php");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Creacion de Liga.</h3>
    </div>
    <div class="panel-body">
        <form action="/cc5pj/controller/league/new-league.php" method="post" enctype="multipart/form-data"  data-toggle="validator">
            <input type="hidden" name="url" value="/cc5pj/league">
            <div class="form-group">
                <label for="name">Nombre de la Liga</label>
                <input required type="text" class="form-control" id="name" name="name" placeholder="Liga Guatemalteca, Liga Francesa">
            </div>                        
            <div class="form-group" >
                    <label for="idcountry">Pais</label>
                    <input type="hidden" id="hidden-idcountry" name="idcountry">
                    <select id="idcountry" class="form-control">                        
                        <?php
                            $country = new Country;
                            foreach ($country->getAllCountries() as $country) {
                                echo "<option data-description='".$country["code"]."' value='".$country["idcountry"]."' data-imagesrc='/cc5pj/img/flags/".strtolower($country["code"]).".svg'>".$country["country"]."</option>";
                            }
                        ?>
                    </select>
                    <script type="text/javascript">
                    jQuery('#idcountry').ddslick(
                        {
                            width: 600, 
                            height: 350,
                            onSelected: function(data){
                                console.info(data);
                                jQuery("#hidden-idcountry").attr("value", data.selectedData.value);                     
                            }    
                        });
                    </script>
            </div>            
            <div class="form-group">
                <label for="photo">Foto</label>
                <input required type="file" id="photo" name="photo" accept="image/*">
                <p class="help-block">Elije una fotografia.</p>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;&nbsp;CREAR LIGA
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include("../includes/footer.php");
?>
