<?php session_start() ?>
<?php include_once('includes/header.php'); ?>
    <!-- Topbar Start --><div class="container-fluid bg-primary py-3 d-none d-md-block">
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
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Services</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Services</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3 class="section-title position-relative text-center mb-5">Nos services incluent l’organisation d'événements sur mesure, avec une attention particulière à chaque détail pour garantir leur succès</h3>
                </div>
            </div>
            <div class="row">
                <?php
$con=mysqli_connect("localhost","root","","db_events");
$select="select * from services ";
$resultat=mysqli_query($con,$select);
foreach($resultat as $r){


                ?>
            
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                            <h4 class="font-weight-bold text-white mb-0"></h4>
                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="assets/<?=  $r['image']?>" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4"> <?=  $r["libelle"]?></h5>
                        <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                    </div>
                </div>
                <?php
            }
            ?>  
                <div class="col-12 text-center">
                    <a href="" class="btn btn-primary py-3 px-5">Load More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <?php include_once('includes/footer.php'); ?>

    <!-- Navbar Start -->
    <?php include_once('includes/navbar.php'); ?>
    <!-- Navbar End -->