<?php
include('includes/header.php');
session_start();
$user = $_SESSION['user']; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include('includes/sidebar.php') ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('includes/topbar.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
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
                                        function saveService($libelle, $description, $image)
                                        {
                                            //var_dump("formulaire recu au serveur");
                                            // se connecter à la base
                                            $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                            // requete  SQL
                                            $insert = "INSERT INTO `services`(`libelle`, `description`,`image`) VALUES (\"" . $libelle . "\",\"" . $description . "\",\"" . $image . "\")";
                                            $result = mysqli_query($con, $insert);
                                        }
                                        function validateLibelle($libelle)
                                        {
                                            //var_dump("formulaire recu au serveur");
                                            // se connecter à la base
                                            $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                            // requete  SQL
                                            $select = "SELECT libelle FROM services WHERE libelle=\"" . $libelle . "\"";

                                            return mysqli_query($con, $select);
                                        }



                                        // soumission de formulaire par la methode POST
                                        $errors = [];
                                        if (isset($_POST['valid'])) {
                                            // recuperation des données
                                            $libelle = $_POST['libelle'];
                                            $description = $_POST['description'];
                                            $image = $_FILES['fichier'];

                                            $target_dir = "C:\\xampp\\htdocs\\events\\testes\\";


                                            $fichier = $_FILES['fichier'];
                                            $filename = "service-" . uniqid() . ".jpg";
                                            if (move_uploaded_file($fichier["tmp_name"], $target_dir . $filename)) {
                                                echo "The file " . htmlspecialchars(basename($_FILES["fichier"]["name"])) . " has been uploaded.";
                                            }


                                            // validation des données
                                            // contraintes
                                            if (empty($libelle)) {
                                                $errors[] = "libelle is required";
                                            }
                                            if (empty($description)) {
                                                $errors[] = "description is required";
                                            }
                                            if (($image['size']) <= 0) {
                                                $errors[] = "image is required";
                                            }
                                            if (mysqli_num_rows(validateLibelle($libelle)) > 0) {
                                                $errors[] = "libelle already exists";
                                            }
                                            if (count($errors) <= 0) {
                                                saveService($libelle, $description, $filename);
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (count($errors) > 0) {
                                            foreach ($errors as $error) {

                                        ?>
                                                <div class="alert alert-danger"><?= $error ?></div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Libellé</label>
                                                <input type="text" class="form-control" name="libelle" id="exampleInputEmail1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description" id="exampleInputEmail1">
                                            </div>

                                            <label for="fichier">Image</label>
                                            <input type="file" name="fichier" id="">


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
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



    </div>
    <!-- End of Page Wrapper -->

    <?php include('includes/footer.php') ?>