<?php include_once('../shared/header.php'); ?>
<!-- navbar de site -->
<?php include_once('../shared/navbar.php'); ?>
<!-- /navbar de site -->
<!-- division de la page -->
<?php
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '', 'db_events');
$delete = "SELECT * FROM utilisateurs WHERE id = $id";
$utilisateurs = mysqli_fetch_assoc(mysqli_query($con, $delete)); 
?>
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
                <div class="card-header text-center bg-primary text-white">Gestion des utilisateur</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Modifier une utilisateur</div>
                                <div class="card-body">
                                    <?php
                                    function editutilisateur($first_name, $last_name,$email, $user_name,$password, $phone,$adresse, $avatar)
                                    {
                                        //var_dump("formulaire recu au serveur");
                                        // se connecter à la base
                                        $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                        // requete  SQL
                                        $insert = "UPDATE `utilisateurs` SET `first_name`=\"".$first_name."\",`last_name`=\"".$last_name."\",`email`=\"".$email."\",`user_name`=\"".$user_name."\",`password`=\"".$password."\",`phone`=\"".$phone."\",`adresse`=\"".$adresse."\",`avatar`=\"".$avatar."\" WHERE  ";
                                        
                                        $result = mysqli_query($con, "SELECT * FROM utilisateurs");
                                    }
                                    // soumission de formulaire par la methode POST
                                    $errors = [];
                                    if (isset($_POST['valid'])) {
                                        // recuperation des données
                                        $first_name = $_POST['first_name'];
                                        $last_name = $_POST['last_name'];
                                        $email = $_POST['email'];
                                        $user_name = $_POST['user_name'];
                                        $password = $_POST['password'];
                                        $phone = $_POST['phone'];
                                        $adresse = $_POST['adresse'];
                                        $avatar = $_POST['avatar'];
                                        // validation des données
                                        // contraintes
                                        if (empty($first_name)) {
                                            $errors[] = "first_name is required";
                                        }
                                        if (empty($last_name)) {
                                            $errors[] = "last_name is required";
                                        }
                                        if (empty($email)) {
                                            $errors[] = "email is required";
                                        }
                                        if (empty($user_name)) {
                                            $errors[] = "user_name is required";
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
                                        if (empty($avatar)) {
                                            $errors[] = "avatar is required";
                                        }
                                        if (count($errors) <= 0) {
                                            editutilisateur($first_name, $last_name,$email, $user_name,$password, $phone,$adresse, $avatar);
                                        }
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">first_name</label>
                                            <input type="text" class="form-control" name="first_name" value="<?= $utilisateurs['first_name'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">last_name</label>
                                            <input type="text" class="form-control" name="last_name" value="<?= $utilisateurs['last_name'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">email</label>
                                            <input type="text" class="form-control" name="email" value="<?= $utilisateurs['email'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">user_name</label>
                                            <input type="text" class="form-control" name="user_name" value="<?= $utilisateurs['user_name'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">password</label>
                                            <input type="text" class="form-control" name="password" value="<?= $utilisateurs['password'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">phone</label>
                                            <input type="text" class="form-control" name="phone" value="<?= $utilisateurs['phone'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">adresse</label>
                                            <input type="text" class="form-control" name="adresse" value="<?= $utilisateurs['adresse'] ?>" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">avatar</label>
                                            <input type="text" class="form-control" name="avatar" value="<?= $utilisateurs['avatar'] ?>" id="exampleInputEmail1">
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
<?php include_once('../shared/footer.php'); ?>