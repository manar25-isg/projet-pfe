<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events - Connexion ! </title>
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
              Veuillez saisir votre parametres de connexion
            </div>
            <div class="card-body">
              <?php 

                  if(isset($_POST['validate']))
                  {
                    $errors = [];
                    // recuperation de le formulaire
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // validation d'un formulaire
                    if(strlen($email) <= 0)
                    {
                      $errors[] = "L'email est obligatoire";
                    }
                    if(strlen($password) <= 0)
                    {
                      $errors[] = "Le mot de passe est obligatoire";
                    }
                    if(count($errors) == 0)
                    {
                      // connexion a la base
                      $con = mysqli_connect('localhost','root','', 'db_events');
                      // tester l'existence de l'utilisateur
                      $sql = "SELECT * FROM utilisateurs WHERE email = \"".$email."\"";
                      $exec = mysqli_query($con, $sql);
                      if(mysqli_num_rows($exec) > 0)
                      {
                        $userDetails = mysqli_fetch_assoc($exec);
                        if(!password_verify($password, $userDetails['password'])){
                          $errors[] = "Les parametres invalides";
                        }else{
                            if($userDetails['type_utilisateur'] == "role_admin")
                            {
                                $_SESSION['user'] = $userDetails;
                                header('location: admin/index.php');
                            }else{
                              echo "utilisateur unconnu";
                              die;
                            }
                        }
                      }
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
                  <label for="">Email:</label>
                  <input type="text" name="email" class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Mot de passe</label>
                  <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="form-group mt-2">
                  <button type="submit" name="validate" class="btn btn-xl btn-secondary">se Connecter</button>
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