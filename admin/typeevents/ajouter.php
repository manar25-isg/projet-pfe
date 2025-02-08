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
                <div class="card-header text-center bg-primary text-white">Types d'événement</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Ajouter un type d'événement</div>
                                <div class="card-body">
                                    <?php
                                    function saveType($libelle, $description)
                                    {
                                        //var_dump("formulaire recu au serveur");
                                        // se connecter à la base
                                        $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                        // requete  SQL
                                        $insert = "INSERT INTO `type_evenements`(`libelle`, `description`) VALUES (\"" . $libelle . "\",\"" . $description . "\")";
                                        $result = mysqli_query($con, $insert);
                                    }
                                    function validateLibelle($libelle)
                                    {
                                        //var_dump("formulaire recu au serveur");
                                        // se connecter à la base
                                        $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                        // requete  SQL
                                        $select = "SELECT libelle FROM type_evenements WHERE libelle=\"".$libelle."\"";
    
                                        return mysqli_query($con, $select);

                                    }
                                    // soumission de formulaire par la methode POST
                                    $errors = [];
                                    if (isset($_POST['valid'])) {
                                       
                                        $libelle = $_POST['libelle'];
                                        $description = $_POST['description'];
                                        
                                        if (empty($libelle)) {
                                            $errors[] = "libelle is required";
                                        }
                                        if (empty($description)) {
                                            $errors[] = "description is required";
                                        }
                                        if (mysqli_num_rows(validateLibelle($libelle))>0) {
                                            $errors[] = "libelle already exists";
                                        }
                                        if (count($errors) <= 0) {
                                            saveType($libelle , $description);
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