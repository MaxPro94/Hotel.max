<?php if (isset($_SESSION['user_id'])) : ?>
    <div class="container">
        <div class="row">
            <h1 class="mt-5">L'<?= $resultat['nom'] ?></h1>
            <div class="col-12 d-flex justify-content-center">
                <img src="<?= $resultat['photo'] ?>" class="img-fluid my-4 img-thumbnail" alt="..." style="width: 50%">
                <br>
                <br>
                <div>
                    <h5 class="display-7 py-4 my-5 mx-4 ">Adresse : <?= $numero . ' ' . $rue . ' ' . $ville . ' ' . $cp ?>.</h5>

                    <h6 class="display-7 py-4 my-5 mx-4 "><?= $resultat['description_full'] ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <h2>Les chambres :</h2>
            <div class="col d-flex justify-content-around">
                <?php foreach ($resultat_chambre as $chambre) : ?>
                    <div class="card my-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $chambre['photo'] ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $chambre['nom'] ?></h5>
                                    <p class="card-text"><?= $chambre['description'] ?></p>
                                    <a href="?page=reservation_chambre&id_hotel=<?= $id_hotel ?>&id_chambre=<?= $chambre['id_chambre'] ?>" class="btn btn-dark mt-2">Réserver cette chambre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if (!isset($_SESSION['user_id'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Petit malin</h1>
            </div>
        </div>
    </div>

<?php endif ?>