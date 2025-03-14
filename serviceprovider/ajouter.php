<?php
function saveServiceprovider($date, $libelle)
{
  //var_dump("formulaire recu au serveur");
  // se connecter à la base
  $con = mysqli_connect('localhost', 'root', '', 'db_events');
  // requete  SQL
  $insert = "INSERT INTO `serviceprovider`(`date`,`libelle`) VALUES (\"" . $date . "\",\"" . $libelle . "\")";
  $result = mysqli_query($con, $insert);
}
function validatedate($libelle)
{
  //var_dump("formulaire recu au serveur");
  // se connecter à la base
  $con = mysqli_connect('localhost', 'root', '', 'db_events');
  // requete  SQL
  $select = "SELECT date FROM serviceprovider WHERE libelle=\"" . $libelle . "\"";

  return mysqli_query($con, $select);
}



// soumission de formulaire par la methode POST
$errors = [];
if (isset($_POST['valid']))
  // recuperation des données
  $date = $_POST['date'];
$libelle = $_POST['libelle'];










// validation des données
// contraintes

if (empty($libelle)) {
  $errors[] = "libelle is required";

  if (count($errors) <= 0) {
    saveServiceprovider($date, $libelle);
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
    <label for="exampleInputEmail1" class="form-label">date</label>
    <input type="text" class="form-control" name="libelle" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">libelle</label>
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
<?php include_once('../footer.php'); ?>