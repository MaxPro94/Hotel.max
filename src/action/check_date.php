<?php

$requete_check_date = $maDB->prepare("SELECT date_start, date_end FROM reservation WHERE id_chambre = :id_chambre");
$requete_check_date->execute([
    'id_chambre' => $_GET['id_chambre']
]);
$data = $requete_check_date->fetchAll();
