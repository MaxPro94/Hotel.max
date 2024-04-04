<?php

if (isset($_POST['submit_inscription'])) {

    $erreurs = [];

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];

    if (empty($nom) || strlen($nom) <= 1) {
        $erreurs['nom'] = "Le champs 'nom' est obligatoirer est doit être renseigner avec plus d'une lettre";
    }

    if (empty($prenom) || strlen($prenom) <= 1) {
        $erreurs['prenom'] = "Le champs 'prenom' est obligatoirer est doit être renseigner avec plus d'une lettre.";
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $erreurs['mail'] = "Le champs 'e-mail' est obligatoire est doit être renseigner avec un e-mail au bon format";
    }

    if (empty($pwd) || strlen($pwd) < 8) {
        $erreurs['pwd'] = "Le champs 'mot de passe' est obligatoire est doit comporter un minimum de 8 caractères";
    }

    if (!preg_match('/[a-zA-Z0-9\!\@\$\€\*\^\§\%\&]{8,32}/', $pwd)) {
        $erreurs['pwd_not_accept'] = "Le mot de passe renseigner doit contenir entre 8 et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    }

    if ($pwd !== $pwd2) {
        $erreurs['pwd'] = "Les mots de passe ne sont pas identiques";
    } else {
        $salt = 'mt1';
        $pwd = password_hash($pwd . $salt, PASSWORD_BCRYPT);
    }

    if (empty($erreurs)) {

        $requete = $maDB->prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE mail = :mail");
        $requete->execute([
            'mail' => $mail
        ]);
        $resultat = $requete->fetch();

        if ($resultat['nb'] > 0) {
            $erreurs['mail'] = "Le mail renseigner existe déjà";
        } else {
            $requete_insert = $maDB->prepare("INSERT INTO utilisateur (nom, prenom, mail, password) VALUES (:nom, :prenom, :mail, :password)");
            $requete_insert->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail,
                'password' => $pwd
            ]);


            if ($maDB->lastInsertID()) {
                session_start();

                $requete_select = $maDB->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
                $requete_select->execute([
                    'mail' => $mail
                ]);


                $resultat_user = $requete_select->fetch();


                $_SESSION['user_id'] = $resultat_user['id_utilisateur'];
                $_SESSION['prenom'] = $resultat_user['prenom'];

                header('Location: ?page=index');
            }
        }
    }
}
