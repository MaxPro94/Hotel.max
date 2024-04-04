<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if (isset($_GET['id_hotel'])) {
        $id_hotel = $_GET['id_hotel'];

        $requete = $maDB->prepare("SELECT * FROM hotel WHERE id_hotel = :id_hotel");
        $requete->execute([
            ':id_hotel' => $id_hotel
        ]);
        $resultat = $requete->fetch();
        $id_adresse = $resultat['id_adresse'];

        $requete_adresse = $maDB->prepare("SELECT * FROM adresse WHERE id_adresse = :id_adresse");
        $requete_adresse->execute([
            'id_adresse' => $id_adresse
        ]);
        $resultat_adresse = $requete_adresse->fetch();

        $ville = $resultat_adresse['ville'];
        $rue = $resultat_adresse['rue'];
        $cp = $resultat_adresse['cp'];
        $numero = $resultat_adresse['numero'];

        $requete_chambre = $maDB->prepare("SELECT * FROM chambre_hotel JOIN chambre WHERE chambre_hotel.id_hotel = :id_hotel AND chambre.id_chambre = chambre_hotel.id_chambre");
        $requete_chambre->execute([
            ':id_hotel' => $id_hotel
        ]);
        $resultat_chambre = $requete_chambre->fetchAll();
    }
} else {
    header('HTTP/1.1 500 No Record Found');
}
