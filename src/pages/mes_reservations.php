<?php
session_start();
$title = 'Mes reservations';
if (isset($_GET['page'])) {
    if (isset($_SESSION['user_id'])) {
        $requete_reserv = $maDB->prepare("SELECT * FROM reservation WHERE id_utilisateur = :id_utilisateur ORDER BY id_reservation");
        $requete_reserv->execute([
            'id_utilisateur' => $_SESSION['user_id']
        ]);
        $reservations = $requete_reserv->fetchAll();

        if ($reservations) {
            foreach ($reservations as $reservation) {
                $requete_user = $maDB->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
                $requete_user->execute([
                    'id_utilisateur' => $_SESSION['user_id']
                ]);
                $user = $requete_user->fetch();

                $requete_chambre = $maDB->prepare("SELECT * FROM chambre WHERE id_chambre = :id_chambre");
                $requete_chambre->execute([
                    'id_chambre' => $reservation['id_chambre']
                ]);
                $chambre = $requete_chambre->fetch();

                $requete_hotel = $maDB->prepare("SELECT * FROM hotel JOIN chambre_hotel WHERE chambre_hotel.id_hotel = hotel.id_hotel AND chambre_hotel.id_chambre = :id_chambre");
                $requete_hotel->execute([
                    'id_chambre' => $reservation['id_chambre']
                ]);
                $hotel = $requete_hotel->fetch();

                $requete_adresse = $maDB->prepare("SELECT * FROM adresse WHERE id_adresse = :id_adresse");
                $requete_adresse->execute([
                    'id_adresse' => $hotel['id_adresse']
                ]);
                $adresse = $requete_adresse->fetch();

                if (isset($_POST['delete_reser'])) {

                    $requete = $maDB->prepare("DELETE FROM reservation WHERE id_utilisateur = :id_utilisateur");
                    $requete->execute([
                        'id_utilisateur' => $_SESSION['user_id']
                    ]);

                    header('Refresh: 0');
                }
            }
        }
    }
}
