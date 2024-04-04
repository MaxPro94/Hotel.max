<div class="container">
    <h1 class="mt-5">Votre reservation à bien été enregistrée !</h1>
    <h5>Date de d'enrergistrement de la reservation : <?= $reservation['date_de_demande'] ?></h5>
    <div class="col-12 col-md-6 mt-3">
        <strong>Nom reservation</strong>
        <p><?= $user['Nom'] . ' ' . $user['prenom'] ?></p>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <strong>Adresse</strong>
            <p><?= $adresse['numero'] . ' ' . $adresse['rue'] . ' ' . $adresse['ville'] . ' ' . $adresse['cp'] ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <?php if (isset($_SESSION['user_id'])) : ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Hotel</th>
                            <th>Déscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img class="img-fluid" width="100" src="<?= $hotel['photo'] ?>"></td>
                            <td>L'<?= $hotel['nom'] ?></td>
                            <td><?= $hotel['description_full'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Chambre</th>
                            <th scope="col">Déscription</th>
                            <th scope="col">Date d'entrée</th>
                            <th scope="col">Date de sortie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?= $chambre['photo'] ?>" alt="" class="img-fluid" width="100"></td>
                            <td><?= $chambre['nom'] ?></td>
                            <td><?= $chambre['description'] ?></td>
                            <td><?= $reservation['date_start'] ?></td>
                            <td><?= $reservation['date_end'] ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total : </strong></td>
                            <td><?= $reservation['prix_total'] ?> €</td>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>