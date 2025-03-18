<?php
include('includes/header.php');
session_start();
$user = $_SESSION['user']; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AM <sup>Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="bienvenue.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de board</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Utilisateurs</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/events/admin/clients.php">Clients</a>
                        <a class="collapse-item" href="/events/admin/prestataires.php">Prestataires</a>
                    </div>
                </div>
            </li>






            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/events/admin/services.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Services</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/events/admin/type_evenements.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Type d'evenements</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/events/admin/evenements.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Evenements</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/events/admin/reservations.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Résrvation</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <?php include('includes/content.php') ?>



    </div>
    <!-- End of Page Wrapper -->

    <?php include('includes/footer.php') ?>