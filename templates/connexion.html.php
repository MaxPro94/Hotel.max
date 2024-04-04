<div class="container my-5 py-5">
    <div class="row justify-content-center my-5 py-5">
        <div class="col-6 py-5 my-5">
            <h1 class="my-5">Connexion</h1>
            <form method="POST">
                <?php if (isset($erreurs['form'])) :  ?>
                    <span class="text-danger"><?= $erreurs['form'] ?></span>
                <?php endif ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email :</label>
                    <input type="email" name="mail" class="form-control" placeholder="name@example.com">
                    <?php if (isset($erreurs['mail'])) :  ?>
                        <span class="text-danger"><?= $erreurs['mail'] ?></span>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
                    <input type="password" name="pwd" class="form-control" placeholder="password">
                    <?php if (isset($erreurs['pwd'])) :  ?>
                        <span class="text-danger"><?= $erreurs['pwd'] ?></span>
                    <?php endif ?>
                </div>
                <button type="submit" name="submit_connex" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>