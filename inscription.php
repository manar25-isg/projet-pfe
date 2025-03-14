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
    <h1 class="text-white display-3 mt-lg-5">inscription</h1>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="index.php">Accueil</a></p>
      <i class="fa fa-circle px-3"></i>
      <p class="m-0">inscription</p>
    </div>
  </div>
</div>
<!-- Header End -->
<div class="card-body">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <?php
      function validateemail($email)
      {
        //var_dump("formulaire recu au serveur");
        // se connecter à la base
        $con = mysqli_connect('localhost', 'root', '', 'db_events');
        // requete  SQL
        $select = "SELECT email FROM utilisateurs WHERE email=\"" . $email . "\"";

        return mysqli_query($con, $select);
      }

      if (isset($_POST['validate'])) {
        $errors = [];
        // recuperation de le formulaire
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $type_user = $_POST['type_user'];
        // validation d'un formulaire
        if (strlen($first_name) <= 0) {
          $errors[] = "Le prénom est obligatoire";
        }
        if (strlen($last_name) <= 0) {
          $errors[] = "Le nom est obligatoire";
        }
        if ($password !== $confirm_password) {
          $errors[] = "Les deux mot de passes ne sont pas identiques";
        }
        if (mysqli_num_rows(validateemail($email)) > 0) {
          $errors[] = "email déja exist";
        }
        if (count($errors) == 0) {
          $passwordHash = password_hash($password, PASSWORD_ARGON2I);
          // connexion a la base
          $con = mysqli_connect('localhost', 'root', '', 'db_events');
          // requete  SQL
          $insert = "INSERT INTO `utilisateurs`(`first_name`, `last_name`, `email`, `type_utilisateur`, `password`, `phone`, `adresse`) VALUES (\"" . $first_name . "\",\"" . $last_name . "\",\"" . $email . "\",\"" . $type_user . "\",\"" . $passwordHash . "\",\"" . $phone . "\",\"" . $address . "\")";
          $result = mysqli_query($con, $insert);
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
        <div class="form-group">
          <label for="">Prénom *</label>
          <input type="text" name="first_name" class="form-control" id="" required>
        </div>
        <div class="form-group">
          <label for="">Nom *</label>
          <input type="text" name="last_name" class="form-control" id="" required>
        </div>

        <div class="form-group">
          <label for="">Email *</label>
          <input type="email" name="email" class="form-control" id="" required>
        </div>
        <div class="form-group">
          <label for="">Numéro Tél *</label>
          <input type="number" name="phone" class="form-control" id="" required>
        </div>
        <div class="form-group">
          <label for="">َAdresse *</label>
          <textarea name="address" id="" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="">Mot de passe *</label>
          <input type="password" name="password" class="form-control" id="" required>
        </div>
        <div class="form-group">
          <label for="">Confirmer Mot de passe *</label>
          <input type="password" name="confirm_password" class="form-control" id="" required>
        </div>
        <div class="form-group">
          <label for="">Merci de préciser votre type de compte: </label>
          <select name="type_user" id="" class="form-control">
            <option value="role_service_requester">Client</option>
            <option value="role_service_provider">Préstataire de service</option>
          </select>
        </div>
        <div class="form-group mt-2">
          <div>
            <button class="btn btn-primary btn-block py-3 px-5" type="submit" name="validate">Valider</button>
          </div>
          <div>
            <button class="btn btn-primary btn-block py-3 px-5 mt-3" type="submit" name="validate">Annuler</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>

</div>
</div>

</div>
</div>
</main>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
<?php include_once('includes/footer.php'); ?>

</html>