<div class="container">
    <div class="row justify-content-center">
        <h1 class="my-5 p-3">Les chambres :</h1>
        <?php foreach ($resultats_chambres as $chambre) : ?>
            <div class="col-6">
                <div class="card my-3 mx-5" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $chambre['photo'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $chambre['nom'] ?></h5>
                                <p class="card-text"><small class="text-muted"><?= $chambre['prix'] ?> €</small></p>
                                <a class="btn btn-dark mt-4">Réserver</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>