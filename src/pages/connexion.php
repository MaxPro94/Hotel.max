<?php

if (isset($_POST['submit_connex'])) {
    $erreurs = [];

    if (empty($_POST['mail']) && empty($_POST['pwd'])) {
        $erreurs['form'] = "Les champs e-mail et mot de passe sont obligatoires.";
    }

    if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['mail'] = "Veuillez renseigner un e-mail valide";
    }

    if (empty($_POST['pwd']) || strlen($_POST['pwd']) < 8) {
        $erreurs['pwd'] = "Veuillez renseigner un mot de passe valide";
    }

    if (empty($erreurs)) {
        $mail = $_POST['mail'];
        $salt = "mt1";
        $pwd = $_POST['pwd'] . $salt;

        $requete = $maDB->prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE mail = :mail");
        $requete->execute([
            'mail' => $mail
        ]);
        $resultat = $requete->fetch();

        if ($resultat['nb'] < 1) {
            $erreurs['mail'] = "Veuillez renseigner un e-mail valide";
        }

        if (empty($erreurs)) {

            $requete_user = $maDB->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
            $requete_user->execute([
                'mail' => $mail
            ]);
            $resultat_user = $requete_user->fetch();


            if (password_verify($pwd, $resultat_user['password'])) {

                session_start();
                $_SESSION['user_id'] = $resultat_user['id_utilisateur'];
                $_SESSION['prenom'] = $resultat_user['prenom'];

                header('Location: ?page=index');
            } else {
                $erreurs['pwd'] = "Veuillez renseigner un mot de passe valide";
            }
        }
    }
}
