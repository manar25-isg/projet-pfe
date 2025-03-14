<?php
    $adminPath = __DIR__;
    var_dump($adminPath);
    include_once('header.php'); 
?>
<!-- navbar de site -->
<?php include_once('navbar.php'); ?>
<?php session_start(); 
   

?>
<!-- /navbar de site -->
<!-- division de la page -->
<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Mes Services</div>
                <div class="card-body">
                    <?php
                        include_once('menu.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Informations generales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  text-center bg-info text-white">Nombre services</div>
                                <div class="card-body">11</div>
                            
                                    <a href="serviceprovider/ajouter.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg> Ajouter Service</a>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>date</th>
                                                <th>libelle</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                                $con = mysqli_connect('localhost','root','','db_events');
                                                $select = "SELECT * FROM serviceprovider";
                                                $results = mysqli_query($con, $select);
                                                foreach ($results as $serviceprovider) {
                                                    ?>

                                                <tr>
                                                
                                                <td><?= $serviceprovider['date'] ?></td>
                                                <td><?= $serviceprovider['libelle'] ?></td>
                                                <td>
                                                    <a href="../services/supprimer.php?id=<?= $serviceprovider['id'] ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg></a>
                                                    <a href="../services/modifier.php?id=<?= $serviceprovider['id'] ?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
</svg></a>
                                                </td>
                                            </tr>


                                                    <?php
                                                }
                                           ?>
                                        </tbody>
                                    </table>
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
