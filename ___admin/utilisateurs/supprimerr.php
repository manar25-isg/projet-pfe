<?php 

    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','','db_events');
    $delete = "DELETE FROM `utilisateurs` WHERE id = $id";
    $results = mysqli_query($con, $delete);
    header('location: listee.php');