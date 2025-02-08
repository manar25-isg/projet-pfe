<?php
    $adminPath = __DIR__;
    var_dump($adminPath);
    include_once('shared/header.php'); 
?>
<!-- navbar de site -->
<?php include_once('shared/navbar.php'); ?>
<?php session_start(); 
    if(!isset($_SESSION['user']))
    {
        header('location: ../index.php');
    }

?>
<!-- /navbar de site -->
<!-- division de la page -->
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Menu Principale</div>
                <div class="card-body">
                    <?php
                        include_once('shared/menu.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Informations generales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Nombre services</div>
                                <div class="card-body">7</div>
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
<?php include_once('shared/footer.php'); ?>