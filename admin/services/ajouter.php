<?php include_once('../../header.php'); ?>
<!-- navbar de site -->
<?php include_once('../../navbar.php'); ?>
<!-- /navbar de site -->
<!-- division de la page -->
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Menu Principale</div>
                <div class="card-body">
                    <?php
                    include_once('../shared/menu.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Gestion des services</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Ajouter un service</div>
                                <div class="card-body">
                                    <?php
                                    function saveService($libelle, $description)
                                    {
                                        //var_dump("formulaire recu au serveur");
                                        // se connecter à la base
                                        $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                        // requete  SQL
                                        $insert = "INSERT INTO `services`(`libelle`, `description`) VALUES (\"" . $libelle . "\",\"" . $description . "\")";
                                        $result = mysqli_query($con, $insert);
                                    }
                                    // soumission de formulaire par la methode POST
                                    $errors = [];
                                    if (isset($_POST['valid'])) {
                                        // recuperation des données
                                        $libelle = $_POST['libelle'];
                                        $description = $_POST['description'];
                                        //$image = $_POST['image'];
                                        // validation des données
                                        // contraintes
                                        if (empty($libelle)) {
                                            $errors[] = "libelle is required";
                                        }
                                        if (empty($description)) {
                                            $errors[] = "description is required";
                                        }
                                       
                                        if (count($errors) <= 0) {
                                            saveService($libelle , $description);
                                        }
                                    }
                                    ?>
                                    <?php
                                        if(count($errors) > 0){
                                           foreach($errors as $error){

                                            ?>
                                            <div class="alert alert-danger"><?= $error ?></div>
                                            <?php
                                           }
                                        }
                                    ?>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Libellé</label>
                                            <input type="text" class="form-control" name="libelle" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description" id="exampleInputEmail1">
                                        </div>
                                        
                                        <button type="submit" name="valid" class="btn btn-primary">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('../../footer.php'); ?>