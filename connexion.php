<?php session_start() ?>
<?php include_once('includes/header.php'); ?>
<!-- Topbar Start -->
<!-- Topbar Start -->
<div class="container-fluid bg-primary py-3 d-none d-md-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
        <?php include_once('includes/menu-user.php'); ?>
      </div>
      <?php include_once('includes/reseaux_sociaux.php'); ?>
    </div>
  </div>
</div>
<!-- Topbar End -->
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include_once('includes/navbar.php'); ?>
<!-- Navbar End -->


<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
  <div class="container text-center py-5">
    <h1 class="text-white display-3 mt-lg-5">Connexion</h1>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="index.php">Accueil</a></p>
      <i class="fa fa-circle px-3"></i>
      <p class="m-0">Connexion</p>
    </div>
  </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <h3 class="section-title position-relative text-center mb-5">Veuillez Saisir Vos identifiants</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="contact-form bg-light rounded p-5">
          <?php

          if (isset($_POST['validate'])) {
            $errors = [];
            // recuperation de le formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];
            // validation d'un formulaire
            if (strlen($email) <= 0) {
              $errors[] = "L'email est obligatoire";
            }
            if (strlen($password) <= 0) {
              $errors[] = "Le mot de passe est obligatoire";
            }
            if (count($errors) == 0) {
              // connexion a la base
              $con = mysqli_connect('localhost', 'root', '', 'db_events');
              // tester l'existence de l'utilisateur
              $sql = "SELECT * FROM utilisateurs WHERE email = \"" . $email . "\"";
              $exec = mysqli_query($con, $sql);
              if (mysqli_num_rows($exec) > 0) {
                $userDetails = mysqli_fetch_assoc($exec);
                if (!password_verify($password, $userDetails['password'])) {
                  $errors[] = "Les parametres invalides";
                } else {
                  if ($userDetails['type_utilisateur'] == "role_admin") {
                    $_SESSION['user'] = $userDetails;
                    header('location: admin/index.php');
                  } else {
                    echo "utilisateur unconnu";
                    die;
                  }
                }
              }
            }
          }
          ?>
          <?php
          if (isset($errors) && count($errors) > 0) {
            foreach ($errors as $error) {


          ?>
              <div class="alert alert-danger">
                <?= $error ?>
              </div>
          <?php
            }
          }
          ?>
          <form action="" method="POST">

            <div class="control-group">
              <input type="email" class="form-control p-4" name="email" placeholder="Votre Adresse Email" required="required" data-validation-required-message="SVP entrer votre email" />

            </div>
            <div class="control-group">
              <input type="password" class="form-control p-4" name="password" placeholder="Votre mot de passe" required="required" data-validation-required-message="SVP entrer votre mot de passse">

            </div>
            <div>
              <button class="btn btn-primary btn-block py-3 px-5" type="submit" name="validate">Se Connecter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->

<?php include_once('includes/footer.php'); ?>