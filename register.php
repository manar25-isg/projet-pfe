<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Bienvenue </title>
</head>
<body>
   <header>
    <img src="" alt="">
    <h1>Bienvenue dans notre site !</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">se connecter</a>
    </nav>
   </header> 
   <main>
     
       <form action="" method="post">
            <p><label for="">Nom:</label><input type="text" name="lastname" id=""></p>
            <p><label for="">Prenom:</label><input type="text" name="firstname" id=""></p>
            <p> <label for="">Email:</label><input type="text" name="email" id=""></p>
            <p><label for="">Telephone:</label> <input type="number" name="phone" id=""></p>
            <p><label for="">Nom d'utilisateur:</label><input type="text" name="username" id=""></p>
            <p><label for="">Mot de passe:</label><input type="password" name="password" id=""></p>
            <p><label for="">Confirmer Mot de passe:</label><input type="password" name="repassword" id=""></p>
            <p><label for="">Adresse:</label><textarea name="address"></textarea></p>
            <button type="submit" name="inscrire">Inscrire</button>
            <button type="reset">Annuler</button>
        </form>
   </main> 
   <?php 

if(isset($_POST['inscrire'])){
    
    // recuperation des donnees
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];
   // $lastname = $_POST["repassword"];
    $address = $_POST["address"];
    // validation des donnees
    // connexion a la base de donneers
    $con = mysqli_connect('localhost','root','', 'db_events');
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `user_name`, `password`, `phone`, `adresse`) VALUES (\"".$firstname."\",\"".$lastname."\",\"".$email."\",\"".$username."\",\"".$password."\",\"".$phone."\",\"".$address."\")";
    mysqli_query($con, $sql);
    echo "Inscription validé vous pouvez connecter maintenant";
}

?> 
</body>
</html>