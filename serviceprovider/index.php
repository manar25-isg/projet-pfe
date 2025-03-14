<?php
    $adminPath = __DIR__;
    var_dump($adminPath);
    include_once('header.php'); 
?>
<!-- navbar de site -->
<?php include_once('navbar.php'); ?>
<?php session_start(); 
   

?>
<!-- /navbar de site -->
<!-- division de la page -->
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Mes Services</div>
                <div class="card-body">
                    <?php
                        include_once('ajouter.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Informations generales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Nombre services</div>
                                <div class="card-body">11</div>
                            </div>
                        </div>
                        <div class="col">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
