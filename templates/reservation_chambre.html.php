<div class="container">
    <h1 class="mt-5">La <?= $resultat_chambre['nom'] ?></h1>
    <h5><?= $resultat_hotel['nom'] ?></h5>
    <img src="<?= $resultat_hotel['photo'] ?>" alt="" class="img-fluid" width="200">

    <div class="row">
        <div class="col-12 col-md-6">
            <strong>Adresse</strong>
            <p><?= $resultat_adresse['numero'] . ' ' . $resultat_adresse['rue'] . ' ' . $resultat_adresse['ville'] . ' ' . $resultat_adresse['cp'] ?></p>
        </div>
        <?php if (isset($erreurs['date'])) : ?>
            <span><?= $erreurs['date'] ?></span>
        <?php endif ?>
        <?php if (isset($error)) : ?>
            <span class="text-danger" id="erreur_php"><?= $error['reserv'] ?></span>
        <?php endif; ?>
        <span class="text-danger" id="error"></span>
        <span class="text-success" id="validation"></span>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <table class="table mt-4 text-black">
                    <thead>
                        <tr class="text-center">
                            <th scope=" col"></th>
                            <th scope="col">Chambre</th>
                            <th></th>
                            <th scope="col">Description</th>
                            <th scope="col">Date d'entrée</th>
                            <th scope="col">Date de sortie</th>
                            <th scope="col">Prix par nuit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?= $resultat_chambre['photo'] ?>" alt="" class="img-fluid" width="100"></td>
                            <td><?= $resultat_chambre['nom'] ?>. </td>
                            <td></td>
                            <td class="mx-3"><?= $resultat_chambre['description'] ?>.</td>
                            <form method="POST">
                                <td><input type="date" id="date_start" name="date_start" max="2025-12-31" min="2024-01-01"></td>
                                <td><input type="date" id="date_end" name="date_end" max="2025-12-31" min="2024-01-01"></td>
                                <td class="text-end"><strong><?= $resultat_chambre['prix'] ?> €</strong></td>
                                <input id="prix" type="hidden" value="<?= $resultat_chambre['prix'] ?>">
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end"><strong>Prix total du séjour :</strong></td>
                            <td id="resultat_nuit"></td>
                            <input type="hidden" name="nuit" id="php" value=""></input>
                        </tr>
                    </tfoot>
                </table>

            <?php endif; ?>
            <div class="text-end mt-4">
                <input type="hidden" name="chambre" id="id_chambre" value="<?= $id_chambre ?>"></input>
                <button type="button" id="valid_date" class="btn btn-lg btn-warning mx-2 mb-5">Verifier les dates</button>
                <button type="submit" name="submit_reserv" class="btn btn-lg btn-dark mb-5">Valider la reservation</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/date_calcul.js"></script>