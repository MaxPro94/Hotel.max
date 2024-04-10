<div class="container">
    <div class="row justify-content-center">
        <h1 class="my-5 p-3">Les chambres :</h1>
        <?php foreach ($resultats_chambres as $chambre) : ?>
            <div class="col-6">
                <div class="card my-3 mx-5" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="<?= $chambre['photo'] ?>" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title"><?= $chambre['nom'] ?></h5>
                                <p class="card-text"><small class="text-muted"><?= $chambre['prix'] ?> €</small></p>
                                <p class="card-text"> <?= $chambre['description'] ?></p>

                            </div>

                        </div>
                    </div>
                    <a class="btn btn-dark mt-2" href="?page=reservation_chambre&id_hotel=<?= $chambre['id_hotel'] ?>&id_chambre= <?= $chambre['id_chambre'] ?>">Réserver</a>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>