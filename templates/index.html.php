<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-5">Bienvenue sur Hotel-solite !</h1>
            <h3>Les hotels présent sur le site sont des exclusivités.</h3>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <h5 class="navbar-brand mx-5">Kakou kakou <?= $_SESSION['prenom'] ?></h5>
            <?php endif ?>
        </div>
    </div>
    <div class="row g-0 d-flex justify-content-around">
        <?php foreach ($resultat as $hotel) : ?>
            <div class="col-3 mx-2">
                <div class="card my-2 border-dark">
                    <img src="<?= $hotel['photo'] ?>" class="card-img img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $hotel['nom'] ?></h5>
                        <p class="card-text"><?= $hotel['description'] ?></p>
                    </div>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <div class="text-center mb-1">
                            <a href="?page=reservation&id_hotel=<?= $hotel['id_hotel'] ?>" class="btn btn-dark" value="<?= $hotel['id_hotel'] ?>">Résérvations & informations</a>
                        </div>
                    <?php endif ?>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>