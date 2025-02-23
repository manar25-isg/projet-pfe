<<?php session_start() ?>
    <?php include_once('includes/header.php'); ?>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <?php include_once('includes/menu-user.php'); ?>
                </div>
                <?php include_once('includes/reseaux_sociaux.php'); ?>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include_once('includes/navbar.php'); ?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Galerie</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="index.php">Accueil</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Galerie</p>
            </div>
        </div>
        </div>
        <!-- Header End -->


        <!-- Portfolio Start -->
        <div class="container-fluid py-5 px-0">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <h1 class="section-title position-relative text-center mb-5">Explorez notre galerie d'événements pour découvrir des moments mémorables capturés lors de nos projets</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-4 pb-2" id="portfolio-flters">
                            <li class="btn btn-sm btn-outline-primary m-1 active" data-filter="*">Tous</li>
                            <li class="btn btn-sm btn-outline-primary m-1" data-filter=".first">Mariages</li>
                            <li class="btn btn-sm btn-outline-primary m-1" data-filter=".second">Anniversaires</li>
                            <li class="btn btn-sm btn-outline-primary m-1" data-filter=".third">fiançailles</li>
                        </ul>
                    </div>
                </div>
                <div class="row m-0 portfolio-container">
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item first">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/1.jpg" alt="">
                            <a class="portfolio-btn" href="assets/1.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item second">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/2.jpg" alt="">
                            <a class="portfolio-btn" href="assets/2.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item third">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/3.jpg" alt="">
                            <a class="portfolio-btn" href="assets/3.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item first">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/4.jpg" alt="">
                            <a class="portfolio-btn" href="assets/4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item second">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/5.jpg" alt="">
                            <a class="portfolio-btn" href="assets/5.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 portfolio-item third">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="assets/6.jpg" alt="">
                            <a class="portfolio-btn" href="assets/6.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 p-0 portfolio-item third">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="assets/image1.jpg" alt="">
                                <a class="portfolio-btn" href="assets/image1.jpg" data-lightbox="portfolio">
                                    <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio End -->


            <!-- Footer Start -->

            <?php include_once('includes/footer.php'); ?>
            <!-- Footer End -->

            </body>



            </html>