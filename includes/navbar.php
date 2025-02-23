<?php 
$actual_link = $_SERVER['REQUEST_URI'];

$pageCourante = explode('/',$actual_link)[2];
?>
<div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">AM</span>EVENTS</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?= $pageCourante == 'index.php' ?  'active': '' ?>">Accueil</a>
                        <a href="apropos.php" class="nav-item nav-link <?= $pageCourante == 'apropos.php' ?  'active': '' ?>">A propos</a>
                        <a href="evennements.php" class="nav-item nav-link  <?= $pageCourante == 'evennements.php' ?  'active': '' ?>">Evennements</a>
                    </div>
                    <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">AM</span>EVENTS</h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="services.php" class="nav-item nav-link  <?= $pageCourante == 'services.php' ?  'active': '' ?>">Service</a>
                        <a href="galerie.php" class="nav-item nav-link <?= $pageCourante == 'galerie.php' ?  'active': '' ?>">Galerie</a>
                        <a href="inscription.php" class="nav-item nav-link <?= $pageCourante == 'inscription.php' ?  'active': '' ?>">Contact</a>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>