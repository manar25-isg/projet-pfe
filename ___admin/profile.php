<?php include_once('shared/header.php'); ?>
<!-- navbar de site -->
<?php include_once('shared/navbar.php');
session_start();
//$connecteduser = $_SESSION['user'];
$user = "SELECT * FROM utilisateurs WHERE id = 1";
$con = mysqli_connect('localhost', 'root', '', 'db_events');
$exec = mysqli_query($con, $user);
$data = mysqli_fetch_assoc($exec);

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
                <div class="card-header text-center bg-primary text-white">Mon profile</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">

                                <?php
                                function editprofile($first_name, $last_name, $email, $password, $phone, $adresse, $id, $filename)
                                {
                                    //var_dump("formulaire recu au serveur");
                                    // se connecter à la base
                                    $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                    // requete  SQL
                                    $update = "UPDATE `utilisateurs` SET `first_name`=\"" . $first_name . "\",`last_name`=\"" . $last_name . "\",`email`=\"" . $email . "\",`password`=\"" . $password . "\",`phone`=\"" . $phone . "\",`avatar`=\"" . $filename . "\",`adresse`=\"" . $adresse . "\"  WHERE `id`=\"" . $id . "\",";

                                    $result = mysqli_query($con, $update);
                                }
                                // soumission de formulaire par la methode POST
                                $errors = [];
                                if (isset($_POST['valid'])) {

                                    // recuperation des données
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                    $phone = $_POST['phone'];
                                    $adresse = $_POST['adresse'];
                                    $avatar = $_FILES['avatar'];
                                    $id = $connecteduser['id'];


                                    if (empty($first_name)) {
                                        $errors[] = "first_name is required";
                                    }
                                    if (empty($last_name)) {
                                        $errors[] = "last_name is required";
                                    }
                                    if (empty($email)) {
                                        $errors[] = "email is required";
                                    }

                                    if (empty($password)) {
                                        $errors[] = "password is required";
                                    }
                                    if (empty($phone)) {
                                        $errors[] = "phone is required";
                                    }
                                    if (empty($adresse)) {
                                        $errors[] = "adresse is required";
                                    }
                                    if (($avatar['size']) <= 0) {
                                        $errors[] = "avatar is required";
                                    }
                                    if (count($errors) <= 0) {

                                        $filename = "profile-" . uniqid() . ".jpg";
                                        if (move_uploaded_file($avatar["tmp_name"], $target_dir . $filename)) {
                                            echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
                                        }
                                        editprofile($first_name, $last_name, $email,  $password, $phone, $adresse, $filename, $id);
                                    } else {
                                        echo "Sorry, there was an error uploading your file.";
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

                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" value="<?= $data['first_name'] ?>" name="first_name" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                                        <input type="text" class="form-control" value="<?= $data['last_name'] ?>" name="last_name" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="text" class="form-control" value="<?= $data['email'] ?>" name="email" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Ancien mot de passe</label>
                                        <input type="text" class="form-control" name="old_password" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe</label>
                                        <input type="text" class="form-control" name="new_password" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Numéro Téléphone:</label>
                                        <input type="text" class="form-control" value="<?= $data['phone'] ?>" name="phone" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Confirmer mot de passe</label>
                                        <input type="text" class="form-control" name="new_password" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" value="<?= $data['adresse'] ?>" name="adresse" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">avatar</label>
                                        <input type="file" class="form-control" value="<?= $data['avatar'] ?>" name="avatar" id="exampleInputEmail1">
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
<?php include_once('shared/footer.php'); ?>