<?php
include('includes/header.php');
session_start();
$user = $_SESSION['user']; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include('includes/sidebar.php') ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('includes/topbar.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Gestion des services</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Liste des services</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $con = mysqli_connect('localhost', 'root', '', 'db_events');
                                            $sql = "SELECT * FROM services";
                                            $results = mysqli_query($con, $sql);
                                            foreach ($results as $service) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="/events/assets/<?= $service['image'] ?>" target="_blank">
                                                            <img height="50px" width="50px" src="/events/assets/<?= $service['image'] ?>"/>
                                                        </a>
                                                    </td>
                                                    <td><?= $service['libelle'] ?></td>
                                                    <td><?= $service['id'] ?></td>
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
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->



    </div>
    <!-- End of Page Wrapper -->

    <?php include('includes/footer.php') ?>