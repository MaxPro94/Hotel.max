<div class="container">
    <div class="row">
        <h1 class="my-4">Les chambres :</h1>
        <?php foreach ($resultats_chambres as $chambre) : ?>
            <div class="col-12">
                <div class="card my-3" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $chambre['photo'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $chambre['nom'] ?></h5>
                                <p class="card-text"><?= $chambre['description'] ?></p>
                                <p class="card-text"><small class="text-muted"><?= $chambre['prix'] ?> €</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>