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