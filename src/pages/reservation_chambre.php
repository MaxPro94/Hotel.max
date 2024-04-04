<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if (isset($_GET['page'])) {
        if (!empty($_GET['id_hotel']) && !empty($_GET['id_chambre'])) {
            $id_chambre = $_GET['id_chambre'];
            $id_hotel = $_GET['id_hotel'];

            $requete_chambre = $maDB->prepare("SELECT * FROM chambre WHERE id_chambre = :id_chambre");
            $requete_chambre->execute([
                'id_chambre' => $id_chambre
            ]);
            $resultat_chambre = $requete_chambre->fetch();


            $requete_hotel = $maDB->prepare("SELECT * FROM hotel WHERE id_hotel = :id_hotel");
            $requete_hotel->execute([
                'id_hotel' => $id_hotel
            ]);
            $resultat_hotel = $requete_hotel->fetch();


            $requete_adresse = $maDB->prepare('SELECT * FROM adresse WHERE id_adresse = :id_adresse');
            $requete_adresse->execute([
                'id_adresse' => $resultat_hotel['id_adresse']
            ]);
            $resultat_adresse = $requete_adresse->fetch();


            if (isset($_POST['submit_reserv'])) {
                $erreurs = [];
                if (!empty($_POST['date_start']) && !empty($_POST['date_end'])) {
                    $start = $_POST['date_start'];
                    $end = $_POST['date_end'];
                    if ($start < $end) {
                        $error = [];
                        $date = date_create();
                        $date_actuelle = $date->format('Y-m-d');
                        $prix_total = $_POST['nuit'];

                        $requete_check_date = $maDB->prepare("SELECT date_start, date_end FROM reservation WHERE id_chambre = :id_chambre");
                        $requete_check_date->execute([
                            'id_chambre' => $_GET['id_chambre']
                        ]);
                        $reservations = $requete_check_date->fetchAll();

                        foreach ($reservations as $reservation) {
                            if ($start < $reservation['date_start'] && $end > $reservation['date_start'] && $end < $reservation['date_end']) {

                                $error['reserv'] = "Une autre réservation démarre pendant les dates que vous avez choisies.";
                            }

                            if ($start > $reservation['date_start'] && $start < $reservation['date_end'] && $end > $reservation['date_start'] && $end > $reservation['date_end']) {
                                $error['reserv'] = "Une autre réservation se termine pendant les dates que vous avez choisies.";
                            }

                            if ($start > $reservation['date_start'] && $start < $reservation['date_end'] && $end > $reservation['date_start'] && $end < $reservation['date_end']) {
                                $error['reserv'] = "Les dates choisies se trouvent au milieu d'une autre réservation plus longue.";
                            }

                            if ($start == $reservation['date_start'] && $end == $reservation['date_end']) {
                                $error['reserv'] = "Il existe déjà une réservation pour ces dates.";
                            }

                            if ($start < $reservation['date_start'] && $end > $reservation['date_end']) {
                                $error['reserv'] = "Il existe déjà une réservation pour les dates que vous avez choisies.";
                            }
                        }

                        if (empty($error)) {

                            $requete_reserv = $maDB->prepare("INSERT INTO reservation (date_start, date_end, date_de_demande, prix_total, id_utilisateur, id_chambre) VALUES (:date_start, :date_end, :date_de_demande, :prix_total, :id_utilisateur, :id_chambre)");
                            $requete_reserv->execute([
                                'date_start' => $start,
                                'date_end' => $end,
                                'date_de_demande' => $date_actuelle,
                                'prix_total' => $prix_total,
                                'id_utilisateur' => $_SESSION['user_id'],
                                'id_chambre' => $id_chambre
                            ]);
                            if ($maDB->lastInsertID()) {
                                header('Location: ?page=validation_reservation');
                            } else {
                                $erreurs['validation'] = "Une erreur s'est produite lors de l'enregistrement de votre réservation.";
                            }
                        }
                    } else {
                        $erreurs['date'] = "La date de sortie doit être supérieur à la date d'entrée.";
                    }
                } else {
                    $erreurs['date'] = "Veuillez renseigner une date d'entrée et une date de sortie.";
                }
            }
        } else {
            header('HTTP/1.1 500 No Record Found');
        }
    } else {
        header('HTTP/1.1 500 No Record Found');
    }
} else {
    header('HTTP/1.1 500 No Record Found');
}
