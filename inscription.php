<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A&M Events - Inscription ! </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <header>
      <img src="" alt="">
      <h1 class="bg bg-primary text-center text-white">Bienvenue dans notre site !</h1>
      <?php include_once('header-menu.php'); ?>
    </header>
    <main>
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header text-center bg-secondary text-white">
              Veuillez saisir votre Informations pour créer un compte
            </div>
            <div class="card-body">
              <?php 

                  if(isset($_POST['validate']))
                  {
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
                    if(strlen($first_name) <= 0)
                    {
                      $errors[] = "Le prénom est obligatoire";
                    }
                    if(strlen($last_name) <= 0)
                    {
                      $errors[] = "Le nom est obligatoire";
                    }
                    if($password !== $confirm_password)
                    {
                        $errors[] = "Les deux mot de passes ne sont pas identiques";
                    }
                    if(count($errors) == 0)
                    {
                      $passwordHash = password_hash($password, PASSWORD_ARGON2I);
                      // connexion a la base
                      $con = mysqli_connect('localhost','root','', 'db_events');
                       // requete  SQL
                      $insert = "INSERT INTO `utilisateurs`(`first_name`, `last_name`, `email`, `type_utilisateur`, `password`, `phone`, `adresse`) VALUES (\"".$first_name."\",\"".$last_name."\",\"".$email."\",\"".$type_user."\",\"".$passwordHash."\",\"".$phone."\",\"".$address."\")";
                      $result = mysqli_query($con, $insert);
                    }
                  }
              ?>
              <?php 
                  if(isset($errors) && count($errors) > 0){
                      foreach($errors as $error){

                      
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
                  <label for="">Prénom</label>
                  <input type="text" name="first_name" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Nom</label>
                  <input type="text" name="last_name" class="form-control" id="">
                </div>
                
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Numéro Tél</label>
                  <input type="number" name="phone" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">َAdresse</label>
                  <textarea name="address" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Mot de passe</label>
                  <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Confirmer Mot de passe</label>
                  <input type="password" name="confirm_password" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Merci de préciser votre type de compte: </label>
                  <select name="type_user" id="" class="form-control">
                    <option value="role_service_requester">Préstataire de service</option>
                    <option value="role_service_provider">Fournisseur de service</option>
                  </select>
                </div>
                <div class="form-group mt-2">
                  <button type="submit" name="validate" class="btn btn-xl btn-secondary">Valider</button>
                  <button type="reset" class="btn btn-xl btn-danger">Annuler</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>









  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>