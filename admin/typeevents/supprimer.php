<?php 

    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','','db_events');
    $delete = "DELETE FROM `type_evenements` WHERE id = $id";
    $results = mysqli_query($con, $delete);
    header('location: liste.php');