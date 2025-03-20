<?php 

    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','','db_events');
    $update = "UPDATE `utilisateurs` SET `statut`= 'active' WHERE id = $id ";
    $results = mysqli_query($con, $update);
    header('location: clients.php');