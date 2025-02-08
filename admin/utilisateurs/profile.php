<?php include_once('../shared/header.php'); ?>
<!-- navbar de site -->
<?php include_once('../shared/navbar.php'); ?>
<?php
session_start();
$utilisateurConnecte = $_SESSION['user'];
?>
<!-- /navbar de site -->
<!-- division de la page -->
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">Menu Principale</div>
                <div class="card-body">
                    <?php
                    include_once('../shared/menu.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                    </svg> Mon Profil</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <img src="../../assets/images/<?= $utilisateurConnecte['avatar'] ?>" alt="image_de_profile">
                                        <div class="form-group">
                                            <label for="">Changer Avatar</label>
                                            <input type="file" name="new_avatar" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom</label>
                                            <input type="text" name="prenom" value="<?= $utilisateurConnecte['first_name'] ?>" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" name="nom" value="<?= $utilisateurConnecte['last_name'] ?>" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" value="<?= $utilisateurConnecte['email'] ?>" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Adresse</label>
                                            <textarea name="adresse" class="form-control"><?= $utilisateurConnecte['email'] ?> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Numéro Tél</label>
                                            <textarea name="adresse" class="form-control"><?= $utilisateurConnecte['phone'] ?> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-xl btn-secondary mt-2">Misé à jour</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('../shared/footer.php'); ?>