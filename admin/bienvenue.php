<?php
include('includes/header.php');
session_start();
$user = $_SESSION['user']; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <?php include('includes/sidebar.php') ?>
        <?php include('includes/content.php') ?>



    </div>
    <!-- End of Page Wrapper -->

    <?php include('includes/footer.php') ?>