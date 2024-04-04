<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-5">Inscription</h1>
            <form method="POST">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <span class="test-success">Inscription réussie !</span>
                <?php endif ?>
                <label for="inputPassword5" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
                <?php if (isset($erreurs['nom'])) : ?>
                    <span class="text-danger"><?= $erreurs['nom'] ?></span>
                <?php endif ?>
                <br>
                <label for="inputPassword5" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
                <?php if (isset($erreurs['prenom'])) : ?>
                    <span class="text-danger"><?= $erreurs['prenom'] ?></span>
                <?php endif ?>
                <br>
                <label for="inputPassword5" class="form-label">E-mail :</label>
                <input type="email" id="mail" name="mail" class="form-control" required>
                <?php if (isset($erreurs['mail'])) : ?>
                    <span class="text-danger"><?= $erreurs['mail'] ?></span>
                <?php endif ?>
                <br>
                <label for="inputPassword5" class="form-label">Mot de passe :</label>
                <input type="password" id="pwd" name="pwd" class="form-control" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                    Votre mot de passe doit comporter entre 8 et 20 caractères, contenir des lettres, des chiffres et des caractères spéciaux et ne doit pas contenir d'espaces ou d'emoji.
                </div>
                <input type="password" id="pwd2" name="pwd2" class="form-control my-1" aria-describedby="passwordHelpBlock" required>
                <?php if (isset($erreurs['pwd'])) : ?>
                    <span class="text-danger"><?= $erreurs['pwd'] ?></span>
                <?php endif ?>
                <button name="submit_inscription" type="submit" class="btn btn-primary mt-3">S'inscrire</button>
            </form>
        </div>
    </div>
</div>